<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

class UserdashboardController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('layout');
    }

    public function index()
    {
        $Books = $this->fetchTable('Books');

        $conditions = [];
        if ($this->request->is('get') && !empty($this->request->getQuery('search'))) {
            $search = $this->request->getQuery('search');
            $conditions['Books.title LIKE'] = '%' . $search . '%';
        }

        $books = $Books->find()->where($conditions);
        $this->set(compact('books'));
    }
    
    public function addToCart()
    {
        if ($this->request->is('post')) {
            $cartData = $this->request->getData('cart');
            
            if (!is_array($cartData) || !isset($cartData['id'], $cartData['title'], $cartData['price'])) {
                $this->Flash->error(__('Invalid cart data.'));
                return $this->redirect(['action' => 'index']);
            }
            
            // Read existing cart from session
            $session = $this->request->getSession();
            $cart = $session->read('Cart') ?? [];

            $bookId = $cartData['id'];
            $quantity = (int)($cartData['quantity'] ?? 1);

            // If the book is already in the cart, update quantity
            if (isset($cart[$bookId])) {
                $cart[$bookId]['quantity'] += $quantity;
            } else {
                $cart[$bookId] = [
                    'id' => $cartData['id'],
                    'title' => $cartData['title'],
                    'price' => $cartData['price'],
                    'quantity' => $quantity
                ];
            }
            
            // Save updated cart back to session
            $session->write('Cart', $cart);
            
            $this->Flash->success(__('The item has been added to your cart.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('Invalid request.'));
        return $this->redirect(['action' => 'index']);
    }
    
    public function viewCart()
    {
        $session = $this->request->getSession();
        $cart = $session->read('Cart') ?? [];
        
        // Calculate grand total safely
        $totalPrice = 0;
        foreach ($cart as $item) {
            $price = isset($item['price']) ? $item['price'] : 0;
            $quantity = isset($item['quantity']) ? $item['quantity'] : 0;
            $totalPrice += $price * $quantity;
        }
        
        $this->set(compact('cart', 'totalPrice'));
    }

    public function removeFromCart($id)
    {
        $session = $this->request->getSession();
        $cart = $session->read('Cart') ?? [];
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $session->write('Cart', $cart);
            $this->Flash->success('Book removed from cart.');
        } else {
            $this->Flash->error('Book not found in cart.');
        }
        return $this->redirect(['action' => 'viewCart']);
    }
    
    public function update()
    {
        $this->request->allowMethod(['post']);
        $quantities = $this->request->getData('quantities');
        $cart = $this->request->getSession()->read('Cart') ?? [];
        
        foreach ($quantities as $id => $quantity) {
            $quantity = (int)$quantity;
            if (isset($cart[$id]) && $quantity > 0) {
                $cart[$id]['quantity'] = $quantity;
            } elseif (isset($cart[$id]) && $quantity <= 0) {
                unset($cart[$id]); // remove item if quantity is 0
            }
        }

            $this->request->getSession()->write('Cart', $cart);
            $this->Flash->success('Cart updated successfully.');
            return $this->redirect(['action' => 'viewCart']);
    }
    
    public function checkout()
    {
        $session = $this->request->getSession();
        $cart = $session->read('Cart') ?? [];
        $this->set('cart', $cart);

        if ($this->request->is('post')) {
            $customerName = $this->request->getData('customer_name') ?? null;

            $BooksTable = $this->fetchTable('Books');
            $InvoicesTable = $this->fetchTable('Invoices');
            $InvoiceItemsTable = $this->fetchTable('InvoiceItems');

            $total = 0;
            $invoiceItems = [];
            $booksToUpdate = [];

            // 1. Check stock availability only
            foreach ($cart as $item) {
                $book = $BooksTable->get($item['id']);
                if ($book->quantity < $item['quantity']) {
                    $this->Flash->error("Out of Stock {$book->title} book.");
                    return $this->redirect(['action' => 'viewCart']);
                }
                $booksToUpdate[$item['id']] = $book; // Save for later update
                $total += $item['price'] * $item['quantity'];
                $invoiceItems[] = [
                    'book_id' => $item['id'],
                    'title' => $item['title'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ];
            }

            // 2. Create invoice
            $invoice = $InvoicesTable->newEmptyEntity();
            $invoice->customer_name = $customerName;
            $invoice->total = $total;
            $invoice->created = date('Y-m-d H:i:s');
            if ($InvoicesTable->save($invoice)) {
                // 3. Save invoice items
                foreach ($invoiceItems as $item) {
                    $invoiceItem = $InvoiceItemsTable->newEmptyEntity();
                    $invoiceItem = $InvoiceItemsTable->patchEntity($invoiceItem, $item);
                    $invoiceItem->invoice_number = $invoice->invoice_number;
                    $InvoiceItemsTable->save($invoiceItem);
                }
                // 4. Now update book quantities
                foreach ($cart as $item) {
                    $book = $booksToUpdate[$item['id']];
                    $book->quantity -= $item['quantity'];
                    $BooksTable->save($book);
                }
                // 5. Clear cart
                $session->delete('Cart');
                return $this->redirect(['action' => 'invoice', $invoice->invoice_number]);
            } else {
                $this->Flash->error('Could not create invoice.');
            }
        }
    }
    
    public function invoice($invoice_number)
    {
        $InvoicesTable = $this->fetchTable('Invoices');
        $InvoiceItemsTable = $this->fetchTable('InvoiceItems');
        
        $invoice = $InvoicesTable->find()->where(['invoice_number' => $invoice_number])->firstOrFail();
        $items = $InvoiceItemsTable->find()->where(['invoice_number' => $invoice_number])->all();
        
        $this->set(compact('invoice', 'items'));

        // PDF generation
        if ($this->request->getQuery('pdf') === '1') {
            $this->viewBuilder()->setClassName('CakePdf.Pdf');
            $this->viewBuilder()->setTemplate('invoice_pdf');
            $this->response = $this->response->withType('application/pdf');
            $this->viewBuilder()->setOption('pdfConfig', [
                'download' => true,
                'filename' => 'invoice' . $invoice_number . '.pdf']);
        }
    }
    
    public function allInvoices()
    {
        $InvoicesTable = $this->fetchTable('Invoices');
        $query = $InvoicesTable->find()->order(['created' => 'ASC']);
        $invoices = $this->paginate($query, [
            'limit' => 10, 
            'order' => ['created' => 'ASC']
        ]);
        $this->set(compact('invoices'));
    } 
}


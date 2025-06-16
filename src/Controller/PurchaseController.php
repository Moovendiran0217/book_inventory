<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Purchase Controller
 *
 * @property \App\Model\Table\PurchaseTable $Purchase
 */
class PurchaseController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('layout');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Purchase->find();
        $purchase = $this->paginate($query, [
            'limit' => 10, 
            'order' => ['purchase_number' => 'DESC']
        ]);

        $this->set(compact('purchase'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    
     public function add()
     {
        $purchase = $this->Purchase->newEmptyEntity();
        
        // Fetch book titles
        $booksTable = $this->fetchTable('Books');
        $books = $booksTable->find('list', [
            'keyField' => 'title',
            'valueField' => 'title'
            ])->toArray();
            
        // Fetch supplier names
        $suppliersTable = $this->fetchTable('Suppliers');
        $suppliers = $suppliersTable->find('list', [
            'keyField' => 'name',
            'valueField' => 'name'
            ])->toArray();
            
        if ($this->request->is('post')) {
            $data = $this->request->getData();
                
            // Calculate total value
            $quantity = isset($data['quantity']) ? (int)$data['quantity'] : 0;
            $costPerUnit = isset($data['cost_per_unit']) ? (float)$data['cost_per_unit'] : 0;
            $data['total'] = $quantity * $costPerUnit;
                
            $purchase = $this->Purchase->patchEntity($purchase, $data);
            if ($this->Purchase->save($purchase)) {
                $this->Flash->success('The Order has been Successfully Saved.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Please, Enter All Mandatory Fields.');
        }
            
        $this->set(compact('purchase', 'books', 'suppliers'));
    }

    /**
     * Recive method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
     public function receive($id = null)
     {
        $this->request->allowMethod(['post', 'put','patch','get']);
        $purchase = $this->Purchase->get($id);
        
        if ($purchase->status !== 'Received') {
            $booksTable = $this->fetchTable('Books');
            if (!empty($purchase->book_title)) {
                // Find the book by title
                $book = $booksTable->find()
                ->where(['title' => $purchase->book_title])
                ->first();
                if ($book) {
                    $book->quantity += $purchase->quantity;
                    $book->cost = $purchase->cost_per_unit;
                    $booksTable->save($book);
                    $purchase->status = 'Received';
                    $this->Purchase->save($purchase);
                    $this->Flash->success('The purchase has been marked as received and updated in book List.');
                } else {
                    $this->Flash->error('Book not found.');
                }
            } else {
                $this->Flash->error('Book title missing in purchase.');
            }
        } else {
            $this->Flash->error('Purchase already marked as received.');
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Cancel method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function cancel($id = null)
    {
        $this->request->allowMethod(['post', 'cancel']);
        $purchase = $this->Purchase->get($id);
        $purchase->status = 'Cancelled';
        if ($this->Purchase->save($purchase)) {
            $this->Flash->success('The purchase has been cancelled.');
        } else {
            $this->Flash->error('The purchase could not be cancelled. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}

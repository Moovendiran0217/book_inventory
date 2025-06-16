<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

class ReportController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('layout');
    }

    public function salesReport()
    {
        $from = $this->request->getQuery('from');
        $to = $this->request->getQuery('to');
        $generate = $this->request->getQuery('generate'); // Button name

        $Invoices = $this->fetchTable('Invoices');
        $query = $Invoices->find()->contain(['InvoiceItems']);

        // Filter by date if provided
        if (!empty($from)) {
            $query->where(['Invoices.created >=' => $from]);
        }
        if (!empty($to)) {
            $query->where(['Invoices.created <=' => $to]);
        }
        $SalesReport = $this->fetchTable('Sales');

        // If generate button is clicked, insert into sales_report table
        if ($generate) {
            // Prevent future dates and empty dates
            $today = date('Y-m-d');
            if (empty($from) || empty($to)) {
                $this->Flash->error('Please provide both From and To dates.');
            } elseif (!empty($from) && !empty($to) && $from > $to) {
                $this->Flash->error('From date cannot be greater than To date.');
            } elseif (!empty($from) && $from > $today) {
                $this->Flash->error('From date cannot be in the future.');
            } elseif (!empty($to) && $to > $today) {
                $this->Flash->error('To date cannot be in the future.');
            } elseif ($from == $to) {
                $this->Flash->error('From and To dates cannot be the same.');
            } else {
                // Calculate total amount and invoice count
                $totalAmount = $Invoices->find()
                    ->select(['total' => 'SUM(Invoices.total)'])
                    ->where($query->clause('where'))
                    ->first()
                    ->total ?? 0;

                $invoiceCount = $Invoices->find()
                    ->where($query->clause('where'))
                    ->count();
                    
                    if ($invoiceCount > 0) {
                        // Insert into SalesReport table
                        $salesReportEntity = $SalesReport->newEmptyEntity();
                        $salesReportEntity->total_amount = $totalAmount;
                        $salesReportEntity->total_order = $invoiceCount;
                        $salesReportEntity->from_date = $from;
                        $salesReportEntity->to_date = $to;
                        $SalesReport->save($salesReportEntity);
                        
                        $this->Flash->success('Sales report generated and saved.');
                        $from = null;
                        $to = null;
                    } else {
                        $this->Flash->error('No invoices found for the selected date range. Report not generated.');
                    }
                }
        }
            $salesReports = $SalesReport->find()->order(['report_id' => 'ASC'])->all();
            $this->set(compact('from', 'to', 'salesReports'));
    }
    
    public function viewSales($id)
    {
        $SalesReport = $this->fetchTable('Sales');
        $report = $SalesReport->get($id);

        $from = $report->from_date ?? null;
        $to = $report->to_date ?? null;

        $Invoices = $this->fetchTable('Invoices');
        $query = $Invoices->find()->contain(['InvoiceItems']);
        
        if ($from) {
            $query->where(['Invoices.created >=' => $from]);
        }
        if ($to) {
            $query->where(['Invoices.created <=' => $to]);
        }
        $invoices = $query->all();

        $this->set(compact('report', 'invoices'));
        
        // PDF generation
        if ($this->request->getQuery('pdf') === '1') {
            $this->viewBuilder()->setClassName('CakePdf.Pdf');
            $this->viewBuilder()->setTemplate('view_sales_pdf');
            $this->response = $this->response->withType('application/pdf');
            $this->viewBuilder()->setOption('pdfConfig', [
                'download' => true,
                'filename' => 'sales_report_' . $id . '.pdf']);
        }
    }

    public function purchaseReport()
    {
        $from = $this->request->getQuery('from');
        $to = $this->request->getQuery('to');
        $generate = $this->request->getQuery('generate'); // Button name

        $Purchase = $this->fetchTable('Purchase');
        $query = $Purchase->find();

        // Filter by date if provided
        if (!empty($from)) {
            $query->where(['Purchase.purchase_date >=' => $from]);
        }
        if (!empty($to)) {
            $query->where(['Purchase.purchase_date <=' => $to]);
        }
        $PurchaseReport = $this->fetchTable('PurchaseReport');

        // If generate button is clicked, insert into sales_report table
        if ($generate) {
            // Prevent future dates and empty dates
            $today = date('Y-m-d');
            if (empty($from) || empty($to)) {
                $this->Flash->error('Please provide both From and To dates.');
            } elseif (!empty($from) && !empty($to) && $from > $to) {
                $this->Flash->error('From date cannot be greater than To date.');
            } elseif (!empty($from) && $from > $today) {
                $this->Flash->error('From date cannot be in the future.');
            } elseif (!empty($to) && $to > $today) {
                $this->Flash->error('To date cannot be in the future.');
            } elseif ($from == $to) {
                $this->Flash->error('From and To dates cannot be the same.');
            } else {
                
                $purchaseCount = $Purchase->find()
                    ->where($query->clause('where'))
                    ->count();
                    
                    if ($purchaseCount > 0) {
                        // Insert into SalesReport table
                        $PurchaseReportEntity = $PurchaseReport->newEmptyEntity();
                        $PurchaseReportEntity->total_purchase = $purchaseCount;
                        $PurchaseReportEntity->from_date = $from;
                        $PurchaseReportEntity->to_date = $to;
                        $PurchaseReport->save($PurchaseReportEntity);
                        
                        $this->Flash->success('Purchase Order report generated and saved.');
                        $from = null;
                        $to = null;
                    } else {
                        $this->Flash->error('No Purchase Order found for the selected date range. Report not generated.');
                    }
                }
        }
            $purchaseReports = $PurchaseReport->find()->order(['report_id' => 'ASC'])->all();
            $this->set(compact('from', 'to', 'purchaseReports'));
    }
    
    public function viewPurchase($id)
    {
        $PurchaseReport = $this->fetchTable('PurchaseReport');
        $report = $PurchaseReport->get($id);

        $from = $report->from_date ?? null;
        $to = $report->to_date ?? null;

        $Purchase = $this->fetchTable('Purchase');
        $query = $Purchase->find();
        
        if ($from) {
            $query->where(['Purchase.purchase_date >=' => $from]);
        }
        if ($to) {
            $query->where(['Purchase.purchase_date <=' => $to]);
        }
        $purchase = $query->all();

        $this->set(compact('report', 'purchase'));
        
        // PDF generation
        if ($this->request->getQuery('pdf') === '1') {
            $this->viewBuilder()->setClassName('CakePdf.Pdf');
            $this->viewBuilder()->setTemplate('view_purchase_pdf');
            $this->response = $this->response->withType('application/pdf');
            $this->viewBuilder()->setOption('pdfConfig', [
                'download' => true,
                'filename' => 'purchase_report_' . $id . '.pdf']);
        }
    }
}

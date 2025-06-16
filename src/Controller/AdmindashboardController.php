<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\I18n\FrozenTime;


class AdmindashboardController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('layout');
    }

    public function index()
    {
        // Load the Users , Books and Suppliers tables
        $users = $this->fetchTable('users');
        $Books = $this->fetchTable('Books');
        $Suppliers = $this->fetchTable('Suppliers');
        $Invoices = $this->fetchTable('Invoices');

        // Get the count of users , books and suppliers
        $usersCount = $users->find()->count();
        $booksCount = $Books->find()->count();
        $suppliersCount = $Suppliers->find()->count();

        // Get the total amount of all sales
        $totalAmount = $Invoices->find()
            ->select(['total' => 'SUM(Invoices.total)'])
            ->first()
            ->total ?? 0;

        // Get the total count of all orders
        $totalOrdersCount = $Invoices->find()
            ->count();

        // Get today's total amount and count of orders  
        $startOfDay = FrozenTime::now()->startOfDay();
        $endOfDay = FrozenTime::now()->endOfDay();

        $todaytotalAmount = $Invoices->find()
            ->select(['total' => 'SUM(Invoices.total)'])
            ->where([
                'Invoices.created >=' => $startOfDay,
                'Invoices.created <=' => $endOfDay
            ])
            ->first()
            ->total ?? 0;

        $ordersCount = $Invoices->find()
            ->where([
                'Invoices.created >=' => $startOfDay,
                'Invoices.created <=' => $endOfDay
            ])
            ->count();

        // Set the counts to be accessible in the view
        $this->set(compact(
            'usersCount',
            'booksCount',
            'suppliersCount',
            'totalAmount',
            'todaytotalAmount',
            'totalOrdersCount',
            'ordersCount'
        ));
    }
}

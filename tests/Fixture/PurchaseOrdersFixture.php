<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchaseOrdersFixture
 */
class PurchaseOrdersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'PONumber' => 1,
                'SupplierName' => 'Lorem ipsum dolor sit amet',
                'PODate' => '2025-06-10 00:56:39',
                'BookTitle' => 'Lorem ipsum dolor sit amet',
                'Quantity' => 1,
                'CostPerUnit' => 1.5,
                'ExpectedDeliveryDate' => '2025-06-10',
                'Status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

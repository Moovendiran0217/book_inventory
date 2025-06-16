<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchaseFixture
 */
class PurchaseFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'purchase';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'purchase_number' => 1,
                'supplier_name' => 'Lorem ipsum dolor sit amet',
                'purchase_date' => '2025-06-11 21:31:02',
                'book_title' => 'Lorem ipsum dolor sit amet',
                'quantity' => 1,
                'cost_per_unit' => 1.5,
                'expected_delivery_date' => '2025-06-11',
                'Status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

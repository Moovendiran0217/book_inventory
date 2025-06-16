<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchaseOrderDetailsFixture
 */
class PurchaseOrderDetailsFixture extends TestFixture
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
                'id' => 1,
                'po_id' => 1,
                'book_id' => 1,
                'quantity' => 1,
                'cost_per_unit' => 1.5,
                'total_amount' => 1.5,
            ],
        ];
        parent::init();
    }
}

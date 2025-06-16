<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoiceItemsFixture
 */
class InvoiceItemsFixture extends TestFixture
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
                'invoice_number' => 1,
                'book_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'price' => 1.5,
                'quantity' => 1,
                'created' => '2025-06-11 18:33:59',
            ],
        ];
        parent::init();
    }
}

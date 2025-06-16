<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoicesFixture
 */
class InvoicesFixture extends TestFixture
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
                'invoice_number' => 1,
                'customer_name' => 'Lorem ipsum dolor sit amet',
                'total' => 1.5,
                'created' => '2025-06-11 18:32:29',
            ],
        ];
        parent::init();
    }
}

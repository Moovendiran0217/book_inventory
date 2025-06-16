<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalesFixture
 */
class SalesFixture extends TestFixture
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
                'report_id' => 1,
                'total_amount' => 1.5,
                'total_order' => 1,
                'generate_date' => '2025-06-11 07:39:34',
            ],
        ];
        parent::init();
    }
}

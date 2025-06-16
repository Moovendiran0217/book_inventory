<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchaseReportFixture
 */
class PurchaseReportFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'purchase_report';
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
                'total_purchase' => 1,
                'from_date' => '2025-06-12',
                'to_date' => '2025-06-12',
                'generate_date' => '2025-06-12 11:02:15',
            ],
        ];
        parent::init();
    }
}

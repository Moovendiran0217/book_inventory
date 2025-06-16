<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseReportTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseReportTable Test Case
 */
class PurchaseReportTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseReportTable
     */
    protected $PurchaseReport;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.PurchaseReport',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PurchaseReport') ? [] : ['className' => PurchaseReportTable::class];
        $this->PurchaseReport = $this->getTableLocator()->get('PurchaseReport', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PurchaseReport);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PurchaseReportTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseOrderDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseOrderDetailsTable Test Case
 */
class PurchaseOrderDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseOrderDetailsTable
     */
    protected $PurchaseOrderDetails;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.PurchaseOrderDetails',
        'app.Pos',
        'app.Books',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PurchaseOrderDetails') ? [] : ['className' => PurchaseOrderDetailsTable::class];
        $this->PurchaseOrderDetails = $this->getTableLocator()->get('PurchaseOrderDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PurchaseOrderDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PurchaseOrderDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PurchaseOrderDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

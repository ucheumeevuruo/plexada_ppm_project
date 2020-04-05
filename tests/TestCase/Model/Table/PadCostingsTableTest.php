<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PadCostingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PadCostingsTable Test Case
 */
class PadCostingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PadCostingsTable
     */
    public $PadCostings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PadCostings',
        'app.Pads',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PadCostings') ? [] : ['className' => PadCostingsTable::class];
        $this->PadCostings = TableRegistry::getTableLocator()->get('PadCostings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PadCostings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

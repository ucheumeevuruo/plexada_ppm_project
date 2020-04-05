<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimTasksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimTasksTable Test Case
 */
class PimTasksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimTasksTable
     */
    public $PimTasks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PimTasks',
        'app.Pims',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PimTasks') ? [] : ['className' => PimTasksTable::class];
        $this->PimTasks = TableRegistry::getTableLocator()->get('PimTasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PimTasks);

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

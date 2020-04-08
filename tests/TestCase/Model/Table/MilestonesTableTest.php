<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MilestonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MilestonesTable Test Case
 */
class MilestonesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MilestonesTable
     */
    public $Milestones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Milestones',
        'app.ProjectDetails',
        'app.Lov',
        'app.Triggers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Milestones') ? [] : ['className' => MilestonesTable::class];
        $this->Milestones = TableRegistry::getTableLocator()->get('Milestones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Milestones);

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

    /**
     * Test identify method
     *
     * @return void
     */
    public function testIdentify()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectFundingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectFundingsTable Test Case
 */
class ProjectFundingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectFundingsTable
     */
    public $ProjectFundings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjectFundings',
        'app.Milestones',
        'app.Projects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectFundings') ? [] : ['className' => ProjectFundingsTable::class];
        $this->ProjectFundings = TableRegistry::getTableLocator()->get('ProjectFundings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectFundings);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectObjectivesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectObjectivesTable Test Case
 */
class ProjectObjectivesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectObjectivesTable
     */
    public $ProjectObjectives;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjectObjectives',
        'app.Projects',
        'app.SystemUsers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectObjectives') ? [] : ['className' => ProjectObjectivesTable::class];
        $this->ProjectObjectives = TableRegistry::getTableLocator()->get('ProjectObjectives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectObjectives);

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

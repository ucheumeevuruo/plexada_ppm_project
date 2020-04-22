<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectComponentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectComponentsTable Test Case
 */
class ProjectComponentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectComponentsTable
     */
    public $ProjectComponents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjectComponents',
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
        $config = TableRegistry::getTableLocator()->exists('ProjectComponents') ? [] : ['className' => ProjectComponentsTable::class];
        $this->ProjectComponents = TableRegistry::getTableLocator()->get('ProjectComponents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectComponents);

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

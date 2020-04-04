<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectDetailsViewTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectDetailsViewTable Test Case
 */
class ProjectDetailsViewTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectDetailsViewTable
     */
    public $ProjectDetailsView;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjectDetailsView',
        'app.Statuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectDetailsView') ? [] : ['className' => ProjectDetailsViewTable::class];
        $this->ProjectDetailsView = TableRegistry::getTableLocator()->get('ProjectDetailsView', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectDetailsView);

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

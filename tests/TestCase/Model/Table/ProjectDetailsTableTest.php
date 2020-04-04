<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectDetailsTable Test Case
 */
class ProjectDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectDetailsTable
     */
    public $ProjectDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjectDetailsOld',
        'app.Vendors',
        'app.Staff',
        'app.Sponsors',
        'app.Lov',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectDetailsOld') ? [] : ['className' => ProjectDetailsTable::class];
        $this->ProjectDetails = TableRegistry::getTableLocator()->get('ProjectDetailsOld', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectDetails);

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

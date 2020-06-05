<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectSponsorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectSponsorsTable Test Case
 */
class ProjectSponsorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectSponsorsTable
     */
    public $ProjectSponsors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjectSponsors',
        'app.Projects',
        'app.Sponsors',
        'app.Lov',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectSponsors') ? [] : ['className' => ProjectSponsorsTable::class];
        $this->ProjectSponsors = TableRegistry::getTableLocator()->get('ProjectSponsors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectSponsors);

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

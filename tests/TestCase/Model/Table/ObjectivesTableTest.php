<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObjectivesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObjectivesTable Test Case
 */
class ObjectivesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ObjectivesTable
     */
    public $Objectives;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Objectives',
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
        $config = TableRegistry::getTableLocator()->exists('Objectives') ? [] : ['className' => ObjectivesTable::class];
        $this->Objectives = TableRegistry::getTableLocator()->get('Objectives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Objectives);

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

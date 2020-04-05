<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PadObjectivesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PadObjectivesTable Test Case
 */
class PadObjectivesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PadObjectivesTable
     */
    public $PadObjectives;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PadObjectives',
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
        $config = TableRegistry::getTableLocator()->exists('PadObjectives') ? [] : ['className' => PadObjectivesTable::class];
        $this->PadObjectives = TableRegistry::getTableLocator()->get('PadObjectives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PadObjectives);

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

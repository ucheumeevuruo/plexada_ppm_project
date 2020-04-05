<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PadActivitiesMeansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PadActivitiesMeansTable Test Case
 */
class PadActivitiesMeansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PadActivitiesMeansTable
     */
    public $PadActivitiesMeans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PadActivitiesMeans',
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
        $config = TableRegistry::getTableLocator()->exists('PadActivitiesMeans') ? [] : ['className' => PadActivitiesMeansTable::class];
        $this->PadActivitiesMeans = TableRegistry::getTableLocator()->get('PadActivitiesMeans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PadActivitiesMeans);

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

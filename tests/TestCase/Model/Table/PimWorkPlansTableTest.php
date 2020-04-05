<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimWorkPlansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimWorkPlansTable Test Case
 */
class PimWorkPlansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimWorkPlansTable
     */
    public $PimWorkPlans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PimWorkPlans',
        'app.Pims',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PimWorkPlans') ? [] : ['className' => PimWorkPlansTable::class];
        $this->PimWorkPlans = TableRegistry::getTableLocator()->get('PimWorkPlans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PimWorkPlans);

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

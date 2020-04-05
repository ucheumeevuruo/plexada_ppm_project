<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimsTable Test Case
 */
class PimsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimsTable
     */
    public $Pims;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pims',
        'app.PimApprovals',
        'app.PimCategories',
        'app.PimMdas',
        'app.PimOversightStructures',
        'app.PimProgressReports',
        'app.PimProjectActionPlans',
        'app.PimProjectComponents',
        'app.PimTasks',
        'app.PimTotalExpenditures',
        'app.PimWorkPlans',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pims') ? [] : ['className' => PimsTable::class];
        $this->Pims = TableRegistry::getTableLocator()->get('Pims', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pims);

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

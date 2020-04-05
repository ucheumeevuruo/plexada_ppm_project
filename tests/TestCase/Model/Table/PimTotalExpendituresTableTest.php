<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimTotalExpendituresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimTotalExpendituresTable Test Case
 */
class PimTotalExpendituresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimTotalExpendituresTable
     */
    public $PimTotalExpenditures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PimTotalExpenditures',
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
        $config = TableRegistry::getTableLocator()->exists('PimTotalExpenditures') ? [] : ['className' => PimTotalExpendituresTable::class];
        $this->PimTotalExpenditures = TableRegistry::getTableLocator()->get('PimTotalExpenditures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PimTotalExpenditures);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimProgressReportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimProgressReportsTable Test Case
 */
class PimProgressReportsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimProgressReportsTable
     */
    public $PimProgressReports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PimProgressReports',
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
        $config = TableRegistry::getTableLocator()->exists('PimProgressReports') ? [] : ['className' => PimProgressReportsTable::class];
        $this->PimProgressReports = TableRegistry::getTableLocator()->get('PimProgressReports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PimProgressReports);

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

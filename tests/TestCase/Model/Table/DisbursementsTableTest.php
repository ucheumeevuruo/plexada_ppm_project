<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisbursementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisbursementsTable Test Case
 */
class DisbursementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DisbursementsTable
     */
    public $Disbursements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Disbursements',
        'app.Projects',
        'app.Milestones',
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
        $config = TableRegistry::getTableLocator()->exists('Disbursements') ? [] : ['className' => DisbursementsTable::class];
        $this->Disbursements = TableRegistry::getTableLocator()->get('Disbursements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Disbursements);

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

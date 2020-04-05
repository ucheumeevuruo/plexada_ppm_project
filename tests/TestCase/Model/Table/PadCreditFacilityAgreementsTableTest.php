<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PadCreditFacilityAgreementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PadCreditFacilityAgreementsTable Test Case
 */
class PadCreditFacilityAgreementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PadCreditFacilityAgreementsTable
     */
    public $PadCreditFacilityAgreements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PadCreditFacilityAgreements',
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
        $config = TableRegistry::getTableLocator()->exists('PadCreditFacilityAgreements') ? [] : ['className' => PadCreditFacilityAgreementsTable::class];
        $this->PadCreditFacilityAgreements = TableRegistry::getTableLocator()->get('PadCreditFacilityAgreements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PadCreditFacilityAgreements);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PadsTable Test Case
 */
class PadsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PadsTable
     */
    public $Pads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pads',
        'app.PadAchievements',
        'app.PadActivitiesMeans',
        'app.PadCostings',
        'app.PadCreditFacilityAgreements',
        'app.PadObjectives',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pads') ? [] : ['className' => PadsTable::class];
        $this->Pads = TableRegistry::getTableLocator()->get('Pads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pads);

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
}

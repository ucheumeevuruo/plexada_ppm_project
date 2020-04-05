<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PadAchievementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PadAchievementsTable Test Case
 */
class PadAchievementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PadAchievementsTable
     */
    public $PadAchievements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PadAchievements',
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
        $config = TableRegistry::getTableLocator()->exists('PadAchievements') ? [] : ['className' => PadAchievementsTable::class];
        $this->PadAchievements = TableRegistry::getTableLocator()->get('PadAchievements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PadAchievements);

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

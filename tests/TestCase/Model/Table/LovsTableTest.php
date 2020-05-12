<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LovsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LovsTable Test Case
 */
class LovsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LovsTable
     */
    public $Lovs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Lovs',
        'app.SystemUsers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Lovs') ? [] : ['className' => LovsTable::class];
        $this->Lovs = TableRegistry::getTableLocator()->get('Lovs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lovs);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimOversightStructuresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimOversightStructuresTable Test Case
 */
class PimOversightStructuresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimOversightStructuresTable
     */
    public $PimOversightStructures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PimOversightStructures',
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
        $config = TableRegistry::getTableLocator()->exists('PimOversightStructures') ? [] : ['className' => PimOversightStructuresTable::class];
        $this->PimOversightStructures = TableRegistry::getTableLocator()->get('PimOversightStructures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PimOversightStructures);

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

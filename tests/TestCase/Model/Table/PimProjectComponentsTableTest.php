<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimProjectComponentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimProjectComponentsTable Test Case
 */
class PimProjectComponentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimProjectComponentsTable
     */
    public $PimProjectComponents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PimProjectComponents',
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
        $config = TableRegistry::getTableLocator()->exists('PimProjectComponents') ? [] : ['className' => PimProjectComponentsTable::class];
        $this->PimProjectComponents = TableRegistry::getTableLocator()->get('PimProjectComponents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PimProjectComponents);

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

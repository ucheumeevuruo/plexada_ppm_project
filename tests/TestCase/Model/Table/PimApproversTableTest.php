<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimApproversTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimApproversTable Test Case
 */
class PimApproversTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimApproversTable
     */
    public $PimApprovers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PimApprovers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PimApprovers') ? [] : ['className' => PimApproversTable::class];
        $this->PimApprovers = TableRegistry::getTableLocator()->get('PimApprovers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PimApprovers);

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

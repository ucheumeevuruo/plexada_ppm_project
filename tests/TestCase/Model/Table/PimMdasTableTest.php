<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimMdasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimMdasTable Test Case
 */
class PimMdasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimMdasTable
     */
    public $PimMdas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PimMdas',
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
        $config = TableRegistry::getTableLocator()->exists('PimMdas') ? [] : ['className' => PimMdasTable::class];
        $this->PimMdas = TableRegistry::getTableLocator()->get('PimMdas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PimMdas);

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

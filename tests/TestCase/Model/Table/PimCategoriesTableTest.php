<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PimCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PimCategoriesTable Test Case
 */
class PimCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PimCategoriesTable
     */
    public $PimCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PimCategories',
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
        $config = TableRegistry::getTableLocator()->exists('PimCategories') ? [] : ['className' => PimCategoriesTable::class];
        $this->PimCategories = TableRegistry::getTableLocator()->get('PimCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PimCategories);

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

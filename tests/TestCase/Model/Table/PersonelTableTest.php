<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonelTable Test Case
 */
class PersonelTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonelTable
     */
    public $Personel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Personel',
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
        $config = TableRegistry::getTableLocator()->exists('Personel') ? [] : ['className' => PersonelTable::class];
        $this->Personel = TableRegistry::getTableLocator()->get('Personel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Personel);

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

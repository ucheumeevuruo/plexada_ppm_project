<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgreementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgreementsTable Test Case
 */
class AgreementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AgreementsTable
     */
    public $Agreements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Agreements',
        'app.Projects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Agreements') ? [] : ['className' => AgreementsTable::class];
        $this->Agreements = TableRegistry::getTableLocator()->get('Agreements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Agreements);

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

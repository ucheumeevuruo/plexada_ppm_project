<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnnotationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnnotationsTable Test Case
 */
class AnnotationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnnotationsTable
     */
    public $Annotations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Annotations',
        'app.ProjectDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Annotations') ? [] : ['className' => AnnotationsTable::class];
        $this->Annotations = TableRegistry::getTableLocator()->get('Annotations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Annotations);

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

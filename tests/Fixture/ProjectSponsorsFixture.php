<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectSponsorsFixture
 */
class ProjectSponsorsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'project_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sponsor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sponsor_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'project_sponsor_ibfk_2' => ['type' => 'index', 'columns' => ['sponsor_id'], 'length' => []],
            'project_sponsor_ibfk_3' => ['type' => 'index', 'columns' => ['sponsor_type_id'], 'length' => []],
            'project_sponsor_ibfk_1' => ['type' => 'index', 'columns' => ['project_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'project_sponsor_ibfk_1' => ['type' => 'foreign', 'columns' => ['project_id'], 'references' => ['projects', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'project_sponsor_ibfk_2' => ['type' => 'foreign', 'columns' => ['sponsor_id'], 'references' => ['sponsors', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'project_sponsor_ibfk_3' => ['type' => 'foreign', 'columns' => ['sponsor_type_id'], 'references' => ['lov', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'project_id' => 1,
                'sponsor_id' => 1,
                'sponsor_type_id' => 1,
                'created' => '2020-06-04 15:38:55',
                'modified' => '2020-06-04 15:38:55',
            ],
        ];
        parent::init();
    }
}

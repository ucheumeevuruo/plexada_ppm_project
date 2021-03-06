<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectMilestonesFixture
 */
class ProjectMilestonesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'record_number' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'project_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'amount' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'payment' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => 'N', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'achievement' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'trigger_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'completed_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'expected_completion_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'status_id' => ['type' => 'index', 'columns' => ['status_id'], 'length' => []],
            'project_id' => ['type' => 'index', 'columns' => ['project_id'], 'length' => []],
            'trigger_id' => ['type' => 'index', 'columns' => ['trigger_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'milestone_ibfk_1' => ['type' => 'foreign', 'columns' => ['project_id'], 'references' => ['project_details', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'milestone_ibfk_2' => ['type' => 'foreign', 'columns' => ['status_id'], 'references' => ['lov', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'milestone_ibfk_3' => ['type' => 'foreign', 'columns' => ['trigger_id'], 'references' => ['lov', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'record_number' => 'Lorem ipsum dolor sit amet',
                'project_id' => 1,
                'amount' => 1,
                'payment' => 'Lorem ipsum dolor sit amet',
                'status_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'achievement' => 'Lorem ipsum dolor sit amet',
                'trigger_id' => 1,
                'completed_date' => '2020-04-21',
                'expected_completion_date' => '2020-04-21',
                'created' => '2020-04-21 03:55:17',
                'modified' => '2020-04-21 03:55:17',
            ],
        ];
        parent::init();
    }
}

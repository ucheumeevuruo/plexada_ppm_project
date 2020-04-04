<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActivitiesFixture
 */
class ActivitiesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'activity_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'project_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'current_activity' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'waiting_on' => ['type' => 'string', 'length' => 70, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'waiting_since' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'next_activity' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'assigned_to_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'percentage_completion' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'priority_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'last_updated' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'system_user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'assigned_to' => ['type' => 'index', 'columns' => ['assigned_to_id'], 'length' => []],
            'priority_id' => ['type' => 'index', 'columns' => ['priority_id'], 'length' => []],
            'system_user_id' => ['type' => 'index', 'columns' => ['system_user_id'], 'length' => []],
            'project_id' => ['type' => 'index', 'columns' => ['project_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['activity_id'], 'length' => []],
            'activity_ibfk_1' => ['type' => 'foreign', 'columns' => ['project_id'], 'references' => ['project_details', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'activity_ibfk_2' => ['type' => 'foreign', 'columns' => ['assigned_to_id'], 'references' => ['staff', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'activity_ibfk_3' => ['type' => 'foreign', 'columns' => ['priority_id'], 'references' => ['lov', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'activity_ibfk_4' => ['type' => 'foreign', 'columns' => ['system_user_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
                'activity_id' => 1,
                'project_id' => 1,
                'current_activity' => 'Lorem ipsum dolor sit amet',
                'waiting_on' => 'Lorem ipsum dolor sit amet',
                'waiting_since' => '2020-01-13',
                'next_activity' => 'Lorem ipsum dolor sit amet',
                'assigned_to_id' => 1,
                'percentage_completion' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'priority_id' => 1,
                'created' => 1578909341,
                'last_updated' => 1578909341,
                'system_user_id' => 1,
            ],
        ];
        parent::init();
    }
}

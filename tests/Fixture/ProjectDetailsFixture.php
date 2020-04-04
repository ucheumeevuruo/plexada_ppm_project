<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectDetailsFixture
 */
class ProjectDetailsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Name' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Description' => ['type' => 'string', 'length' => 600, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'location' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'vendor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'manager_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sponsor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'waiting_on' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'waiting_since' => ['type' => 'string', 'length' => 70, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'start_dt' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'end_dt' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'last_updated' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'system_user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'manager_id' => ['type' => 'index', 'columns' => ['manager_id'], 'length' => []],
            'sponsor_id' => ['type' => 'index', 'columns' => ['sponsor_id'], 'length' => []],
            'status_id' => ['type' => 'index', 'columns' => ['status_id'], 'length' => []],
            'system_user_id' => ['type' => 'index', 'columns' => ['system_user_id'], 'length' => []],
            'vendor_id' => ['type' => 'index', 'columns' => ['vendor_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'project_detail_ibfk_1' => ['type' => 'foreign', 'columns' => ['status_id'], 'references' => ['lov', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'project_detail_ibfk_2' => ['type' => 'foreign', 'columns' => ['vendor_id'], 'references' => ['vendors', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'project_detail_ibfk_3' => ['type' => 'foreign', 'columns' => ['sponsor_id'], 'references' => ['sponsors', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'project_detail_ibfk_4' => ['type' => 'foreign', 'columns' => ['system_user_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'project_detail_ibfk_5' => ['type' => 'foreign', 'columns' => ['manager_id'], 'references' => ['staff', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id' => 1,
                'Name' => 'Lorem ipsum dolor sit amet',
                'Description' => 'Lorem ipsum dolor sit amet',
                'location' => 'Lorem ipsum dolor sit amet',
                'vendor_id' => 1,
                'manager_id' => 1,
                'sponsor_id' => 1,
                'waiting_on' => '2020-01-13',
                'waiting_since' => 'Lorem ipsum dolor sit amet',
                'status_id' => 1,
                'start_dt' => '2020-01-13',
                'end_dt' => '2020-01-13',
                'created' => 1578909548,
                'last_updated' => 1578909548,
                'system_user_id' => 1,
            ],
        ];
        parent::init();
    }
}

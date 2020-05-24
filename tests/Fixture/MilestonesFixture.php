<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MilestonesFixture
 */
class MilestonesFixture extends TestFixture
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
        'name' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'amount' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'payment' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => 'N', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'achievement' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'trigger_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'start_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'end_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'completed_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'expected_completion_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
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
                'name' => 'Lorem ipsum dolor sit amet',
                'amount' => 1,
                'payment' => 'Lorem ipsum dolor sit amet',
                'status_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'achievement' => 'Lorem ipsum dolor sit amet',
                'trigger_id' => 1,
                'start_date' => '2020-05-14 04:25:59',
                'end_date' => '2020-05-14 04:25:59',
                'completed_date' => '2020-05-14',
                'expected_completion_date' => '2020-05-14',
                'created' => '2020-05-14 04:25:59',
                'modified' => '2020-05-14 04:25:59',
            ],
        ];
        parent::init();
    }
}

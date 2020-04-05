<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PimApproversFixture
 */
class PimApproversFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'approvers_agency' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'approvers_rep_information' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'approvers_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => 'current_timestamp()', 'comment' => '', 'precision' => null],
        'signed_mou' => ['type' => 'binary', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'adopted_minutes' => ['type' => 'binary', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'financial_management' => ['type' => 'binary', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'financial_template' => ['type' => 'binary', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
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
                'approvers_agency' => 'Lorem ipsum dolor sit amet',
                'approvers_rep_information' => 'Lorem ipsum dolor sit amet',
                'approvers_date' => '2020-04-05',
                'signed_mou' => 'Lorem ipsum dolor sit amet',
                'adopted_minutes' => 'Lorem ipsum dolor sit amet',
                'financial_management' => 'Lorem ipsum dolor sit amet',
                'financial_template' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PimsFixture
 */
class PimsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'brief' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'funding_agency' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'activities_achievement' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'risks_mitigation' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'activity_next_semester' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'total_expenditure' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'oversight_level' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'oversight_agency_mda' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mda' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'rev_commitee_rep_information' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'approvers_agency' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'approvers_rep_information' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'approvers_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'signed_mou' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'adopted_minutes' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'financial_management' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'financial_template' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'parties' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'responsibilities' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'start_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'end_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'financial_cost' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'targets' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'activities' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'action' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'responsible_party' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'plan_start_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'plan_end_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'dependency' => ['type' => 'string', 'length' => 500, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'category' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'owner' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'currency' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'disbursed_amount' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exp_output_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'task' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'progress_category' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'progress_currency' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'amount_credit_allocation' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'disbursed_current_semester' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'date_disbursement' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cumulated_disbursment' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
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
                'date' => '2020-04-05',
                'brief' => 'Lorem ipsum dolor sit amet',
                'funding_agency' => 'Lorem ipsum dolor sit amet',
                'activities_achievement' => 'Lorem ipsum dolor sit amet',
                'risks_mitigation' => 'Lorem ipsum dolor sit amet',
                'activity_next_semester' => 'Lorem ipsum dolor sit amet',
                'total_expenditure' => 1,
                'oversight_level' => 'Lorem ipsum dolor sit amet',
                'oversight_agency_mda' => 'Lorem ipsum dolor sit amet',
                'mda' => 'Lorem ipsum dolor sit amet',
                'rev_commitee_rep_information' => 'Lorem ipsum dolor sit amet',
                'approvers_agency' => 'Lorem ipsum dolor sit amet',
                'approvers_rep_information' => 'Lorem ipsum dolor sit amet',
                'approvers_date' => '2020-04-05',
                'signed_mou' => 'Lorem ipsum dolor sit amet',
                'adopted_minutes' => 'Lorem ipsum dolor sit amet',
                'financial_management' => 'Lorem ipsum dolor sit amet',
                'financial_template' => 'Lorem ipsum dolor sit amet',
                'parties' => 'Lorem ipsum dolor sit amet',
                'responsibilities' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2020-04-05',
                'end_date' => '2020-04-05',
                'financial_cost' => 1,
                'targets' => 'Lorem ipsum dolor sit amet',
                'activities' => 'Lorem ipsum dolor sit amet',
                'action' => 'Lorem ipsum dolor sit amet',
                'responsible_party' => 'Lorem ipsum dolor sit amet',
                'plan_start_date' => '2020-04-05',
                'plan_end_date' => '2020-04-05',
                'dependency' => 'Lorem ipsum dolor sit amet',
                'category' => 'Lorem ipsum dolor sit amet',
                'owner' => 'Lorem ipsum dolor sit amet',
                'currency' => 'Lorem ipsum dolor sit amet',
                'disbursed_amount' => 1,
                'exp_output_date' => '2020-04-05',
                'task' => 'Lorem ipsum dolor sit amet',
                'progress_category' => 'Lorem ipsum dolor sit amet',
                'progress_currency' => 'Lorem ipsum dolor sit amet',
                'amount_credit_allocation' => 1,
                'disbursed_current_semester' => 'Lorem ipsum dolor sit amet',
                'date_disbursement' => '2020-04-05',
                'cumulated_disbursment' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

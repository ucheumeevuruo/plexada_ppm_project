<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pim Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $brief
 * @property string $funding_agency
 * @property string $activities_achievement
 * @property string $risks_mitigation
 * @property string $activity_next_semester
 * @property int $total_expenditure
 * @property string $oversight_level
 * @property string $oversight_agency_mda
 * @property string $mda
 * @property string $rev_commitee_rep_information
 * @property string $approvers_agency
 * @property string $approvers_rep_information
 * @property \Cake\I18n\FrozenDate $approvers_date
 * @property string $signed_mou
 * @property string $adopted_minutes
 * @property string $financial_management
 * @property string $financial_template
 * @property string $parties
 * @property string $responsibilities
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property int $financial_cost
 * @property string $targets
 * @property string $activities
 * @property string $action
 * @property string $responsible_party
 * @property \Cake\I18n\FrozenDate $plan_start_date
 * @property \Cake\I18n\FrozenDate $plan_end_date
 * @property string $dependency
 * @property string $category
 * @property string $owner
 * @property string $currency
 * @property int $disbursed_amount
 * @property \Cake\I18n\FrozenDate $exp_output_date
 * @property string $task
 * @property string $progress_category
 * @property string $progress_currency
 * @property int $amount_credit_allocation
 * @property string $disbursed_current_semester
 * @property \Cake\I18n\FrozenDate $date_disbursement
 * @property string $cumulated_disbursment
 * @property int $project_id
 */
class Pim extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'brief' => true,
        'funding_agency' => true,
        'activities_achievement' => true,
        'risks_mitigation' => true,
        'activity_next_semester' => true,
        'total_expenditure' => true,
        'oversight_level' => true,
        'oversight_agency_mda' => true,
        'mda' => true,
        'rev_commitee_rep_information' => true,
        'approvers_agency' => true,
        'approvers_rep_information' => true,
        'approvers_date' => true,
        'signed_mou' => true,
        'adopted_minutes' => true,
        'financial_management' => true,
        'financial_template' => true,
        'parties' => true,
        'responsibilities' => true,
        'start_date' => true,
        'end_date' => true,
        'financial_cost' => true,
        'targets' => true,
        'activities' => true,
        'action' => true,
        'responsible_party' => true,
        'plan_start_date' => true,
        'plan_end_date' => true,
        'dependency' => true,
        'category' => true,
        'owner' => true,
        'currency' => true,
        'disbursed_amount' => true,
        'exp_output_date' => true,
        'task' => true,
        'progress_category' => true,
        'progress_currency' => true,
        'amount_credit_allocation' => true,
        'disbursed_current_semester' => true,
        'date_disbursement' => true,
        'cumulated_disbursment' => true,
        'project_id' => true,
    ];
}

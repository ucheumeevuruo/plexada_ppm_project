<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pim Entity
 *
 * @property int $id
 * @property int $pim_approval_id
 * @property int $pim_category_id
 * @property int $pim_mda_id
 * @property \Cake\I18n\FrozenDate $date
 * @property string $brief
 * @property string $funding_agency
 *
 * @property \App\Model\Entity\PimApproval $pim_approval
 * @property \App\Model\Entity\PimCategory $pim_category
 * @property \App\Model\Entity\PimMda $pim_mda
 * @property \App\Model\Entity\PimOversightStructure[] $pim_oversight_structures
 * @property \App\Model\Entity\PimProgressReport[] $pim_progress_reports
 * @property \App\Model\Entity\PimProjectActionPlan[] $pim_project_action_plans
 * @property \App\Model\Entity\PimProjectComponent[] $pim_project_components
 * @property \App\Model\Entity\PimTask[] $pim_tasks
 * @property \App\Model\Entity\PimTotalExpenditure[] $pim_total_expenditures
 * @property \App\Model\Entity\PimWorkPlan[] $pim_work_plans
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
        'pim_approval_id' => true,
        'pim_category_id' => true,
        'pim_mda_id' => true,
        'date' => true,
        'brief' => true,
        'funding_agency' => true,
        'pim_approval' => true,
        'pim_category' => true,
        'pim_mda' => true,
        'pim_oversight_structures' => true,
        'pim_progress_reports' => true,
        'pim_project_action_plans' => true,
        'pim_project_components' => true,
        'pim_tasks' => true,
        'pim_total_expenditures' => true,
        'pim_work_plans' => true,
    ];
}

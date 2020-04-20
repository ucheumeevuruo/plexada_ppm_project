<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property string $introduction
 * @property string $location
 * @property int $cost
 * @property int $project_detail_id
 * @property int $pim_id
 * @property int $project_funding_id
 *
 * @property \App\Model\Entity\ProjectDetail[] $project_details
 * @property \App\Model\Entity\Pim $pim
 * @property \App\Model\Entity\ProjectFunding $project_funding
 * @property \App\Model\Entity\Activity[] $activities
 * @property \App\Model\Entity\Annotation[] $annotations
 * @property \App\Model\Entity\Milestone[] $milestones
 * @property \App\Model\Entity\Objective[] $objectives
 * @property \App\Model\Entity\Price[] $prices
 * @property \App\Model\Entity\ProjectMilestone[] $project_milestones
 * @property \App\Model\Entity\ProjectObjective[] $project_objectives
 * @property \App\Model\Entity\RiskIssue[] $risk_issues
 */
class Project extends Entity
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
        'name' => true,
        'introduction' => true,
        'location' => true,
        'cost' => true,
        'project_detail_id' => true,
        'pim_id' => true,
        'project_funding_id' => true,
        'project_details' => true,
        'pim' => true,
        'project_funding' => true,
        'activities' => true,
        'annotations' => true,
        'milestones' => true,
        'objectives' => true,
        'prices' => true,
        'project_milestones' => true,
        'project_objectives' => true,
        'risk_issues' => true,
    ];
}

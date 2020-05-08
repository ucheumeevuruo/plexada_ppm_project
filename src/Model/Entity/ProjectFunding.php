<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectFunding Entity
 *
 * @property int $id
 * @property int $milestone_id
 * @property int $project_id
 * @property int $funding
 *
 * @property \App\Model\Entity\Milestone $milestone
 * @property \App\Model\Entity\Project[] $projects
 */
class ProjectFunding extends Entity
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
        'milestone_id' => true,
        'project_id' => true,
        'funding' => true,
        'start_date' => true,
        'end_date' => true,
        'currency_id' => true,
        'project' => true,
        'currency' => true
    ];
}

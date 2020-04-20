<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectMilestone Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string $status
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created_at
 * @property string $duration
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectMilestone extends Entity
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
        'project_id' => true,
        'status' => true,
        'description' => true,
        'created_at' => true,
        'duration' => true,
        'project' => true,
    ];
}

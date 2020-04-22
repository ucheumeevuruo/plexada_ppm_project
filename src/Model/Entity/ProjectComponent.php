<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectComponent Entity
 *
 * @property int $id
 * @property int $component
 * @property int $cost
 * @property int $project_id
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectComponent extends Entity
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
        'component' => true,
        'cost' => true,
        'project_id' => true,
        'project' => true,
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Approval Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string|null $project_approval
 * @property string|null $design_approval
 * @property string|null $documents_approval
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Project $project
 */
class Approval extends Entity
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
        'project_approval' => true,
        'design_approval' => true,
        'documents_approval' => true,
        'created' => true,
        'modified' => true,
        'project' => true,
    ];
}

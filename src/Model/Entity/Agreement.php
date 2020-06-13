<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Agreement Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string|null $sponsor_agreement
 * @property string|null $donor_agreement
 * @property string|null $mda_agreement
 * @property string|null $other_documents
 * @property string|null $approve_documents
 * @property string|null $approve_project
 * @property \Cake\I18n\FrozenDate|null $completed_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Project $project
 */
class Agreement extends Entity
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
        'sponsor_agreement' => true,
        'donor_agreement' => true,
        'mda_agreement' => true,
        'other_documents' => true,
        'approve_documents' => true,
        'approve_project' => true,
        'completed_date' => true,
        'created' => true,
        'modified' => true,
        'project' => true,
    ];
}

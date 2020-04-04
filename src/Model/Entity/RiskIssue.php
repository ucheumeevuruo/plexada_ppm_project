<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RiskIssue Entity
 *
 * @property int $id
 * @property string|null $record_number
 * @property int $project_id
 * @property int|null $assigned_to_id
 * @property int $status_id
 * @property string|null $remediation
 * @property string|null $description
 * @property string|null $issue
 * @property int|null $impact_id
 * @property \Cake\I18n\FrozenTime|null $expected_resolution_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProjectDetail $project_detail
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\Lov $lov
 */
class RiskIssue extends Entity
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
        'record_number' => true,
        'project_id' => true,
        'assigned_to_id' => true,
        'status_id' => true,
        'remediation' => true,
        'description' => true,
        'issue' => true,
        'impact_id' => true,
        'expected_resolution_date' => true,
        'created' => true,
        'modified' => true,
        'project_detail' => true,
        'staff' => true,
        'lov' => true,
    ];
}

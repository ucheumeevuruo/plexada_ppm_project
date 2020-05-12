<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Milestone Entity
 *
 * @property int $id
 * @property string|null $record_number
 * @property int $project_id
 * @property int $amount
 * @property string|null $payment
 * @property int|null $status_id
 * @property string|null $description
 * @property string|null $achievement
 * @property int|null $trigger_id
 * @property \Cake\I18n\FrozenDate|null $completed_date
 * @property \Cake\I18n\FrozenDate|null $expected_completion_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Lov $lov
 * @property \App\Model\Entity\Activity[] $activities
 * @property \App\Model\Entity\ProjectFunding[] $project_fundings
 */
class Milestone extends Entity
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
        'amount' => true,
        'payment' => true,
        'status_id' => true,
        'description' => true,
        'achievement' => true,
        'trigger_id' => true,
        'completed_date' => true,
        'expected_completion_date' => true,
        'created' => true,
        'modified' => true,
        'project' => true,
        'lov' => true,
        'activities' => true,
        'project_fundings' => true,
    ];
}

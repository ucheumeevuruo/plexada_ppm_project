<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity
 *
 * @property int $activity_id
 * @property int|null $project_id
 * @property string|null $current_activity
 * @property string|null $waiting_on
 * @property \Cake\I18n\FrozenDate|null $waiting_since
 * @property string|null $next_activity
 * @property int|null $assigned_to_id
 * @property int|null $percentage_completion
 * @property string|null $description
 * @property int $priority_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property int|null $system_user_id
 *
 * @property \App\Model\Entity\ProjectDetail $project_detail
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\Lov $lov
 * @property \App\Model\Entity\User $user
 */
class Activity extends Entity
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
        'current_activity' => true,
        'waiting_on' => true,
        'waiting_since' => true,
        'next_activity' => true,
        'assigned_to_id' => true,
        'percentage_completion' => true,
        'description' => true,
        'priority_id' => true,
        'status_id' => true,
        'completion_date' => true,
        'cost' => true,
        'created' => true,
        'last_updated' => true,
        'system_user_id' => true,
        'project_detail' => true,
        'staff' => true,
        'priority' => true,
        'status' => true,
        'user' => true,
        'milestone_id'=>true,
        'start_date'=>true,
        'end_date'=>true
    ];
}
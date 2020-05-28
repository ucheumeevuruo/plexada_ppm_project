<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Disbursement Entity
 *
 * @property int $disbursement_id
 * @property int|null $project_id
 * @property int|null $milestone_id
 * @property string $name
 * @property int $percentage_completion
 * @property string|null $description
 * @property \Cake\I18n\FrozenDate|null $start_date
 * @property \Cake\I18n\FrozenDate|null $end_date
 * @property float|null $cost
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property int|null $system_user_id
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Milestone $milestone
 * @property \App\Model\Entity\User $user
 */
class Disbursement extends Entity
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
        'milestone_id' => true,
        'name' => true,
        'percentage_completion' => true,
        'description' => true,
        'start_date' => true,
        // 'end_date' => true,
        'cost' => true,
        'created' => true,
        // 'last_updated' => true,
        // 'system_user_id' => true,
        'project' => true,
        'milestone' => true,
        'user' => true,
    ];
}

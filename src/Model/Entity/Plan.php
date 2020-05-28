<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plan Entity
 *
 * @property int $id
 * @property int $activity_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime|null $start_date
 * @property \Cake\I18n\FrozenTime|null $end_date
 *
 * @property \App\Model\Entity\Activity $activity
 */
class Plan extends Entity
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
        'activity_id' => true,
        'name' => true,
        'start_date' => true,
        'end_date' => true,
        'activity' => true,
        'assigned_to_id' => true,
        'title' => true,
        'comment' => true,
        'users_id' => true,
        'plan_type' => true,
    ];
}

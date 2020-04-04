<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActivityOld Entity
 *
 * @property int $activity_id
 * @property int|null $project_id
 * @property string|null $current_activity
 * @property string|null $waiting_on
 * @property \Cake\I18n\FrozenDate|null $waiting_since
 * @property string|null $next_activity
 * @property int|null $percentage_completion
 * @property string|null $description
 * @property string|null $priority
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property string|null $system_user_id
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Lov $lov
 * @property \App\Model\Entity\Personel $personel
 */
class ActivityOld extends Entity
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
        'percentage_completion' => true,
        'description' => true,
        'priority' => true,
        'created' => true,
        'last_updated' => true,
        'system_user_id' => true,
        'project' => true,
        'lov' => true,
        'personel' => true,
    ];
}

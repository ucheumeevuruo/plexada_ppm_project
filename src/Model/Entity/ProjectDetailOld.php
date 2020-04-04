<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectDetailOld Entity
 *
 * @property int $id
 * @property string|null $Name
 * @property string|null $Description
 * @property string|null $location
 * @property int|null $vendor_id
 * @property int|null $manager_id
 * @property int|null $sponsor_id
 * @property string|null $current_status
 * @property \Cake\I18n\FrozenDate|null $start_dt
 * @property \Cake\I18n\FrozenDate|null $end_dt
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property string|null $system_user_id
 *
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Price $price
 * @property \App\Model\Entity\ActivityOld[] $activities
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Sponsor $sponsor
 * @property \App\Model\Entity\ProjectObjective $project_objectives
 */
class ProjectDetailOld extends Entity
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
        'Name' => true,
        'Description' => true,
        'location' => true,
        'vendor_id' => true,
        'manager_id' => true,
        'sponsor_id' => true,
        'waiting_on' => true,
        'waiting_since' => true,
        'status_id' => true,
        'start_dt' => true,
        'end_dt' => true,
        'created' => true,
        'last_updated' => true,
        'system_user_id' => true,
        'vendor' => true,
        'price' => true,
        'activities' => true,
        'manager' => true,
        'sponsor' => true,
        'project_objectives' => true,
//        'system_user' => true,
    ];
}

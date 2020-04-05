<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PimProjectActionPlan Entity
 *
 * @property int $id
 * @property int $pim_id
 * @property string $activities
 * @property string $action
 * @property string $responsible_party
 * @property \Cake\I18n\FrozenDate $plan_start_date
 * @property \Cake\I18n\FrozenDate $plan_end_date
 * @property string $dependency
 *
 * @property \App\Model\Entity\Pim $pim
 */
class PimProjectActionPlan extends Entity
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
        'pim_id' => true,
        'activities' => true,
        'action' => true,
        'responsible_party' => true,
        'plan_start_date' => true,
        'plan_end_date' => true,
        'dependency' => true,
        'pim' => true,
    ];
}

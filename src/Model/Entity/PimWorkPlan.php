<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PimWorkPlan Entity
 *
 * @property int $id
 * @property int $pim_id
 * @property string $parties
 * @property string $responsibilities
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property int $financial_cost
 * @property string $targets
 *
 * @property \App\Model\Entity\Pim $pim
 */
class PimWorkPlan extends Entity
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
        'parties' => true,
        'responsibilities' => true,
        'start_date' => true,
        'end_date' => true,
        'financial_cost' => true,
        'targets' => true,
        'pim' => true,
    ];
}

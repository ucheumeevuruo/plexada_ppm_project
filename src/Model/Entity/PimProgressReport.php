<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PimProgressReport Entity
 *
 * @property int $id
 * @property int $pim_id
 * @property string $progress_category
 * @property string $progress_currency
 * @property int $amount_credit_allocation
 * @property string $disbursed_current_semester
 * @property \Cake\I18n\FrozenDate $date_disbursed
 * @property string $cumulated_disbursement
 *
 * @property \App\Model\Entity\Pim $pim
 */
class PimProgressReport extends Entity
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
        'progress_category' => true,
        'progress_currency' => true,
        'amount_credit_allocation' => true,
        'disbursed_current_semester' => true,
        'date_disbursed' => true,
        'cumulated_disbursement' => true,
        'pim' => true,
    ];
}

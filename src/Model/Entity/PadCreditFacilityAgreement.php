<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PadCreditFacilityAgreement Entity
 *
 * @property int $id
 * @property int $pad_id
 * @property string $funding_agency
 * @property string $conditions
 * @property \Cake\I18n\FrozenDate $deadline
 *
 * @property \App\Model\Entity\Pad $pad
 */
class PadCreditFacilityAgreement extends Entity
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
        'pad_id' => true,
        'funding_agency' => true,
        'conditions' => true,
        'deadline' => true,
        'pad' => true,
    ];
}

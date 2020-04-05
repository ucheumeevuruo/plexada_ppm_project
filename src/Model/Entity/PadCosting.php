<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PadCosting Entity
 *
 * @property int $id
 * @property int $pad_id
 * @property string $project_amount
 * @property string $currency
 * @property \Cake\I18n\FrozenDate $due_date
 * @property string $expected_outcome
 *
 * @property \App\Model\Entity\Pad $pad
 */
class PadCosting extends Entity
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
        'project_amount' => true,
        'currency' => true,
        'due_date' => true,
        'expected_outcome' => true,
        'pad' => true,
    ];
}

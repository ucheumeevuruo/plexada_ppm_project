<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PadAchievement Entity
 *
 * @property int $id
 * @property int $pad_id
 * @property string $specific_objective
 * @property string $first_indicator
 * @property string $second_indicator
 * @property string $third_indicator
 * @property string $forth_indicator
 * @property string $fifth_indicator
 * @property string $sixth_indicator
 * @property string $m_e_method
 * @property string $critical assumptions
 *
 * @property \App\Model\Entity\Pad $pad
 */
class PadAchievement extends Entity
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
        'specific_objective' => true,
        'first_indicator' => true,
        'second_indicator' => true,
        'third_indicator' => true,
        'forth_indicator' => true,
        'fifth_indicator' => true,
        'sixth_indicator' => true,
        'm_e_method' => true,
        'critical assumptions' => true,
        'pad' => true,
    ];
}

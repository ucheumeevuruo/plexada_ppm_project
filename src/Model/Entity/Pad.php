<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pad Entity
 *
 * @property int $id
 * @property int $date
 * @property string $brief
 * @property string $key_players
 * @property string $project_type
 * @property string $project_target
 * @property string $project_details
 * @property int $project_amount
 * @property string $currency
 * @property \Cake\I18n\FrozenDate $due_date
 * @property string $expected_outcome
 * @property int $funding_agency
 * @property string $conditions
 * @property \Cake\I18n\FrozenDate $deadline
 * @property string $heirarchy_of_objectiv
 * @property string $objective_sub_category
 * @property string $specific_oobjective
 * @property string $first_oindicator
 * @property string $second_oindicator
 * @property string $third_oindicator
 * @property string $forth_oindicator
 * @property string $fifth_oindicator
 * @property string $sixth_oindicator
 * @property string $m_e_omethod
 * @property string $critical_oassumptions
 * @property string $specific_aobjective
 * @property string $first_aindicator
 * @property string $second_aindicator
 * @property string $third_aindicator
 * @property string $forth_aindicator
 * @property string $fifth_aindicator
 * @property string $sixth_aindicator
 * @property string $m_e_amethod
 * @property string $critical_aassumptions
 * @property string $specific_mobjectives
 * @property string $first_mindicator
 * @property string $second_mindicator
 * @property string $third_mindicator
 * @property string $forth_mindicator
 * @property string $fifth_mindicator
 * @property string $sixth_mindicator
 * @property string $m_e_mmethod
 * @property string $critical_massumptions
 * @property string|resource $file_upload
 */
class Pad extends Entity
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
        'date' => true,
        'brief' => true,
        'key_players' => true,
        'project_type' => true,
        'project_target' => true,
        'project_details' => true,
        'project_amount' => true,
        'currency' => true,
        'due_date' => true,
        'expected_outcome' => true,
        'funding_agency' => true,
        'conditions' => true,
        'deadline' => true,
        'heirarchy_of_objectiv' => true,
        'objective_sub_category' => true,
        'specific_oobjective' => true,
        'first_oindicator' => true,
        'second_oindicator' => true,
        'third_oindicator' => true,
        'forth_oindicator' => true,
        'fifth_oindicator' => true,
        'sixth_oindicator' => true,
        'm_e_omethod' => true,
        'critical_oassumptions' => true,
        'specific_aobjective' => true,
        'first_aindicator' => true,
        'second_aindicator' => true,
        'third_aindicator' => true,
        'forth_aindicator' => true,
        'fifth_aindicator' => true,
        'sixth_aindicator' => true,
        'm_e_amethod' => true,
        'critical_aassumptions' => true,
        'specific_mobjectives' => true,
        'first_mindicator' => true,
        'second_mindicator' => true,
        'third_mindicator' => true,
        'forth_mindicator' => true,
        'fifth_mindicator' => true,
        'sixth_mindicator' => true,
        'm_e_mmethod' => true,
        'critical_massumptions' => true,
        'file_upload' => true,
    ];
}

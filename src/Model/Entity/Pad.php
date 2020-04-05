<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pad Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $date
 * @property string $brief
 * @property string $key_players
 * @property string $project_type
 * @property string $project_target
 * @property string $details
 *
 * @property \App\Model\Entity\PadAchievement[] $pad_achievements
 * @property \App\Model\Entity\PadActivitiesMean[] $pad_activities_means
 * @property \App\Model\Entity\PadCosting[] $pad_costings
 * @property \App\Model\Entity\PadCreditFacilityAgreement[] $pad_credit_facility_agreements
 * @property \App\Model\Entity\PadObjective[] $pad_objectives
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
        'details' => true,
        'pad_achievements' => true,
        'pad_activities_means' => true,
        'pad_costings' => true,
        'pad_credit_facility_agreements' => true,
        'pad_objectives' => true,
    ];
}

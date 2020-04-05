<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PimProjectComponent Entity
 *
 * @property int $id
 * @property int $pim_id
 * @property string $activities_achievements
 * @property string $risks_mitigations
 * @property string $activity_next_semester
 *
 * @property \App\Model\Entity\Pim $pim
 */
class PimProjectComponent extends Entity
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
        'activities_achievements' => true,
        'risks_mitigations' => true,
        'activity_next_semester' => true,
        'pim' => true,
    ];
}

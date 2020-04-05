<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PimOversightStructure Entity
 *
 * @property int $id
 * @property int $pim_id
 * @property string $oversight_level
 * @property string $oversight_agency_mda
 *
 * @property \App\Model\Entity\Pim $pim
 */
class PimOversightStructure extends Entity
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
        'oversight_level' => true,
        'oversight_agency_mda' => true,
        'pim' => true,
    ];
}

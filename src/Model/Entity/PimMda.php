<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PimMda Entity
 *
 * @property int $id
 * @property string $mda
 * @property string $revision_committee_rep_information
 *
 * @property \App\Model\Entity\Pim[] $pims
 */
class PimMda extends Entity
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
        'mda' => true,
        'revision_committee_rep_information' => true,
        'pims' => true,
    ];
}

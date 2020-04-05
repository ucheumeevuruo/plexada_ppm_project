<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PimTask Entity
 *
 * @property int $id
 * @property string $task
 * @property int $pim_id
 *
 * @property \App\Model\Entity\Pim $pim
 */
class PimTask extends Entity
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
        'task' => true,
        'pim_id' => true,
        'pim' => true,
    ];
}

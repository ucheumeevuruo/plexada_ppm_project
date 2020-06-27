<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Disburse Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string $source_of_funding
 * @property int $amount
 * @property \Cake\I18n\FrozenDate $date
 * @property string|null $description
 *
 * @property \App\Model\Entity\Project $project
 */
class Disburse extends Entity
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
        'project_id' => true,
        'source_of_funding' => true,
        'amount' => true,
        'date' => true,
        'description' => true,
        'project' => true,
    ];
}

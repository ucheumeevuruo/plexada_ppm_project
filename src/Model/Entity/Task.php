<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property string $Task_name
 * @property \Cake\I18n\FrozenDate $Start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property string $Description
 * @property string $Predecessor
 * @property string $Successor
 * @property integer $activities_id
 */
class Task extends Entity
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
        'Task_name' => true,
        'Start_date' => true,
        'end_date' => true,
        'Description' => true,
        'Predecessor' => true,
        'Successor' => true,
        'pm_comment' => true,
        'activity_id' => true,
        'end_date'=>true,
    ];
}
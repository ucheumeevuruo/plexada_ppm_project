<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lov Entity
 *
 * @property int $id
 * @property string|null $lov_type
 * @property string|null $lov_value
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property string|null $system_user_id
 *
 * @property \App\Model\Entity\SystemUser $system_user
 */
class Lov extends Entity
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
        'lov_type' => true,
        'lov_value' => true,
        'created' => true,
        // 'last_updated' => true,
        'system_user_id' => true,
        'system_user' => true,
    ];
}

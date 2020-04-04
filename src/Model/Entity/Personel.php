<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Personel Entity
 *
 * @property int $id
 * @property string|null $Last_name
 * @property string|null $first_name
 * @property string|null $Other_names
 * @property string|null $role
 * @property string|null $Address
 * @property string|null $State
 * @property string|null $country
 * @property string|null $email
 * @property string|null $phone_no
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property string|null $system_user_id
 *
 * @property \App\Model\Entity\SystemUser $system_user
 */
class Personel extends Entity
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
        'Last_name' => true,
        'first_name' => true,
        'Other_names' => true,
        'role' => true,
        'Address' => true,
        'State' => true,
        'country' => true,
        'email' => true,
        'phone_no' => true,
        'created' => true,
        'last_updated' => true,
        'system_user_id' => true,
//        'system_user' => true,
    ];
}

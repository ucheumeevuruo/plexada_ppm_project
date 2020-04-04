<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Staff Entity
 *
 * @property int $id
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $other_names
 * @property string|null $role
 * @property string|null $address
 * @property string|null $state
 * @property string|null $country
 * @property string|null $email
 * @property string|null $phone_no
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property int|null $system_user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Staff extends Entity
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
        'last_name' => true,
        'first_name' => true,
        'full_name' => true,
        'other_names' => true,
        'role_id' => true,
        'address' => true,
        'state' => true,
        'country' => true,
        'email' => true,
        'phone_no' => true,
        'created' => true,
        'last_updated' => true,
        'system_user_id' => true,
        'user' => true,
        'staff' => true,
        'role' => true
    ];

    protected function _getFullName(){
        return $this->first_name . ' ' . $this->last_name;
    }
}

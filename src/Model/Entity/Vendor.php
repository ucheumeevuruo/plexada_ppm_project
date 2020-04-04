<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vendor Entity
 *
 * @property int $id
 * @property string $company_name
 * @property string|null $director1
 * @property string|null $director2
 * @property string|null $director3
 * @property string $address
 * @property string $state
 * @property string $country
 * @property string|null $phone_no
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property int $system_user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ProjectDetail[] $project_details
 */
class Vendor extends Entity
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
        'company_name' => true,
        'director1' => true,
        'director2' => true,
        'director3' => true,
        'address' => true,
        'state' => true,
        'country' => true,
        'phone_no' => true,
        'created' => true,
        'last_updated' => true,
        'system_user_id' => true,
        'user' => true,
        'project_details' => true,
    ];
}

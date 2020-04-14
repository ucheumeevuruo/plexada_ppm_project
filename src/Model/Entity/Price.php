<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Price Entity
 *
 * @property int $id
 * @property int|null $project_id
 * @property float|null $budget
 * @property float|null $total_cost
 * @property float|null $amount_paid
 * @property \Cake\I18n\FrozenDate|null $date_of_payment
 * @property string|null $payment_type
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property string|null $system_user_id
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\SystemUser $system_user
 * @property \App\Model\Entity\Currency $currency
 */
class Price extends Entity
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
		'currency_id' => true,
        'budget' => true,
        'total_cost' => true,
        'amount_paid' => true,
        'date_of_payment' => true,
        'payment_type' => true,
        'created' => true,
        'last_updated' => true,
        'system_user_id' => true,	
        'project' => true,
        'system_user' => true,
		'currency' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PimApprover Entity
 *
 * @property int $id
 * @property string $approvers_agency
 * @property string $approvers_rep_information
 * @property \Cake\I18n\FrozenDate|null $approvers_date
 * @property string|resource $signed_mou
 * @property string|resource $adopted_minutes
 * @property string|resource $financial_management
 * @property string|resource $financial_template
 */
class PimApprover extends Entity
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
        'approvers_agency' => true,
        'approvers_rep_information' => true,
        'approvers_date' => true,
        'signed_mou' => true,
        'adopted_minutes' => true,
        'financial_management' => true,
        'financial_template' => true,
    ];
}

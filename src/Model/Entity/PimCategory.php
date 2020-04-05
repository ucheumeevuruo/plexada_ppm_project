<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PimCategory Entity
 *
 * @property int $id
 * @property string $category
 * @property string $owner
 * @property string $currency
 * @property int $disbursed_amount
 * @property \Cake\I18n\FrozenDate $expected_output_date
 *
 * @property \App\Model\Entity\Pim[] $pims
 */
class PimCategory extends Entity
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
        'category' => true,
        'owner' => true,
        'currency' => true,
        'disbursed_amount' => true,
        'expected_output_date' => true,
        'pims' => true,
    ];
}

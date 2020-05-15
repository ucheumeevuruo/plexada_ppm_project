<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectDetail Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string $description
 * @property string $location
 * @property int|null $vendor_id
 * @property int|null $manager_id
 * @property int|null $sponsor_id
 * @property \Cake\I18n\FrozenDate $waiting_since
 * @property int|null $waiting_on_id
 * @property int $status_id
 * @property int $priority_id
 * @property \Cake\I18n\FrozenDate $start_dt
 * @property \Cake\I18n\FrozenDate $end_dt
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $last_updated
 * @property int $system_user_id
 * @property int|null $annotation_id
 * @property int $project_id
 * @property string $environmental_factors
 * @property string $partners
 * @property int $funding
 * @property int $approvals
 * @property string|null $risks
 * @property string $components
 * @property int|null $price_id
 * @property int $sub_status_id
 *
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\Sponsor $sponsor
 * @property \App\Model\Entity\Lov $lov
 * @property \App\Model\Entity\Lov $priority
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Annotation $annotation
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Price $price
 * @property \App\Model\Entity\Lov $sub_status
 */
class ProjectDetail extends Entity
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
        'name' => true,
        'description' => true,
        'location' => true,
        'vendor_id' => true,
        'manager_id' => true,
        'sponsor_id' => true,
        'waiting_since' => true,
        'waiting_on_id' => true,
        'status_id' => true,
        'priority_id' => true,
        'start_dt' => true,
        'end_dt' => true,
        'created' => true,
        'last_updated' => true,
        'system_user_id' => true,
        'annotation_id' => true,
        'project_id' => true,
        'environmental_factors' => true,
        'completed_percent' => true,
        'partners' => true,
        'funding' => true,
        'approvals' => true,
        // 'risks' => true,
        // 'components' => true,
        'price_id' => true,
        'sub_status_id' => true,
        'vendor' => true,
        'staff' => true,
        'sponsor' => true,
        'lov' => true,
        'priority' => true,
        'user' => true,
        'annotation' => true,
        'project' => true,
        'price' => true,
        'sub_status' => true,
        'donor_id'=>true,
        'mda_id' => true,
        'DLI'=>true,
        'risk_and_issues'=>true,
        'currency'=>true,
        'budget'=>true,
        'expenses '=>true,
    ];
}

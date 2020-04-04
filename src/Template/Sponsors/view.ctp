<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponsor $sponsor
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="sponsors view large-9 medium-8 columns content">
    <h3><?= h($sponsor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($sponsor->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($sponsor->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Names') ?></th>
            <td><?= h($sponsor->other_names) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($sponsor->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($sponsor->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($sponsor->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($sponsor->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($sponsor->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone No') ?></th>
            <td><?= h($sponsor->phone_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $sponsor->has('user') ? $this->Html->link($sponsor->user->id, ['controller' => 'Users', 'action' => 'view', $sponsor->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sponsor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sponsor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Updated') ?></th>
            <td><?= h($sponsor->last_updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Project Details') ?></h4>
        <?php if (!empty($sponsor->project_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col"><?= __('Manager Id') ?></th>
                <th scope="col"><?= __('Sponsor Id') ?></th>
                <th scope="col"><?= __('Waiting On') ?></th>
                <th scope="col"><?= __('Waiting Since') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Start Dt') ?></th>
                <th scope="col"><?= __('End Dt') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Last Updated') ?></th>
                <th scope="col"><?= __('System User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sponsor->project_details as $projectDetails): ?>
            <tr>
                <td><?= h($projectDetails->id) ?></td>
                <td><?= h($projectDetails->Name) ?></td>
                <td><?= h($projectDetails->Description) ?></td>
                <td><?= h($projectDetails->location) ?></td>
                <td><?= h($projectDetails->vendor_id) ?></td>
                <td><?= h($projectDetails->manager_id) ?></td>
                <td><?= h($projectDetails->sponsor_id) ?></td>
                <td><?= h($projectDetails->waiting_on) ?></td>
                <td><?= h($projectDetails->waiting_since) ?></td>
                <td><?= h($projectDetails->status_id) ?></td>
                <td><?= h($projectDetails->start_dt) ?></td>
                <td><?= h($projectDetails->end_dt) ?></td>
                <td><?= h($projectDetails->created) ?></td>
                <td><?= h($projectDetails->last_updated) ?></td>
                <td><?= h($projectDetails->system_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjectDetails', 'action' => 'view', $projectDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectDetails', 'action' => 'edit', $projectDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectDetails', 'action' => 'delete', $projectDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

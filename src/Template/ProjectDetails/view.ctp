<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Detail'), ['action' => 'edit', $projectDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Detail'), ['action' => 'delete', $projectDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Staff'), ['controller' => 'Staff', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staff', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sponsors'), ['controller' => 'Sponsors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsor'), ['controller' => 'Sponsors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Annotations'), ['controller' => 'Annotations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Annotation'), ['controller' => 'Annotations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectDetails view large-9 medium-8 columns content">
    <h3><?= h($projectDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($projectDetail->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($projectDetail->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($projectDetail->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendor') ?></th>
            <td><?= $projectDetail->has('vendor') ? $this->Html->link($projectDetail->vendor->company_name, ['controller' => 'Vendors', 'action' => 'view', $projectDetail->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor') ?></th>
            <td><?= $projectDetail->has('sponsor') ? $this->Html->link($projectDetail->sponsor->full_name, ['controller' => 'Sponsors', 'action' => 'view', $projectDetail->sponsor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff') ?></th>
            <td><?= $projectDetail->has('staff') ? $this->Html->link($projectDetail->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $projectDetail->staff->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lov') ?></th>
            <td><?= $projectDetail->has('lov') ? $this->Html->link($projectDetail->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $projectDetail->lov->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $projectDetail->has('user') ? $this->Html->link($projectDetail->user->username, ['controller' => 'Users', 'action' => 'view', $projectDetail->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Annotation') ?></th>
            <td><?= $projectDetail->has('annotation') ? $this->Html->link($projectDetail->annotation->id, ['controller' => 'Annotations', 'action' => 'view', $projectDetail->annotation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Environmental Factors') ?></th>
            <td><?= h($projectDetail->environmental_factors) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Risks') ?></th>
            <td><?= h($projectDetail->risks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Components') ?></th>
            <td><?= h($projectDetail->components) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $projectDetail->has('price') ? $this->Html->link($projectDetail->price->id, ['controller' => 'Prices', 'action' => 'view', $projectDetail->price->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manager Id') ?></th>
            <td><?= $this->Number->format($projectDetail->manager_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status Id') ?></th>
            <td><?= $this->Number->format($projectDetail->status_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Id') ?></th>
            <td><?= $this->Number->format($projectDetail->project_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funding') ?></th>
            <td><?= $this->Number->format($projectDetail->funding) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approvals') ?></th>
            <td><?= $this->Number->format($projectDetail->approvals) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Status Id') ?></th>
            <td><?= $this->Number->format($projectDetail->sub_status_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waiting Since') ?></th>
            <td><?= h($projectDetail->waiting_since) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Dt') ?></th>
            <td><?= h($projectDetail->start_dt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Dt') ?></th>
            <td><?= h($projectDetail->end_dt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($projectDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Updated') ?></th>
            <td><?= h($projectDetail->last_updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Partners') ?></h4>
        <?= $this->Text->autoParagraph(h($projectDetail->partners)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($projectDetail->projects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Introduction') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col"><?= __('Project Detail Id') ?></th>
                <th scope="col"><?= __('Pim Id') ?></th>
                <th scope="col"><?= __('Project Funding Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projectDetail->projects as $projects): ?>
            <tr>
                <td><?= h($projects->id) ?></td>
                <td><?= h($projects->name) ?></td>
                <td><?= h($projects->introduction) ?></td>
                <td><?= h($projects->location) ?></td>
                <td><?= h($projects->cost) ?></td>
                <td><?= h($projects->project_detail_id) ?></td>
                <td><?= h($projects->pim_id) ?></td>
                <td><?= h($projects->project_funding_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

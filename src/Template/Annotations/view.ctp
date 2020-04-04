<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Annotation $annotation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Annotation'), ['action' => 'edit', $annotation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Annotation'), ['action' => 'delete', $annotation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $annotation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Annotations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Annotation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="annotations view large-9 medium-8 columns content">
    <h3><?= h($annotation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($annotation->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($annotation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Id') ?></th>
            <td><?= $this->Number->format($annotation->project_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($annotation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($annotation->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Project Details') ?></h4>
        <?php if (!empty($annotation->project_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col"><?= __('Manager Id') ?></th>
                <th scope="col"><?= __('Sponsor Id') ?></th>
                <th scope="col"><?= __('Waiting Since') ?></th>
                <th scope="col"><?= __('Waiting On Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Annotation Id') ?></th>
                <th scope="col"><?= __('Sub Status Id') ?></th>
                <th scope="col"><?= __('Priority Id') ?></th>
                <th scope="col"><?= __('Start Dt') ?></th>
                <th scope="col"><?= __('End Dt') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Last Updated') ?></th>
                <th scope="col"><?= __('System User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($annotation->project_details as $projectDetails): ?>
            <tr>
                <td><?= h($projectDetails->id) ?></td>
                <td><?= h($projectDetails->name) ?></td>
                <td><?= h($projectDetails->description) ?></td>
                <td><?= h($projectDetails->location) ?></td>
                <td><?= h($projectDetails->vendor_id) ?></td>
                <td><?= h($projectDetails->manager_id) ?></td>
                <td><?= h($projectDetails->sponsor_id) ?></td>
                <td><?= h($projectDetails->waiting_since) ?></td>
                <td><?= h($projectDetails->waiting_on_id) ?></td>
                <td><?= h($projectDetails->status_id) ?></td>
                <td><?= h($projectDetails->annotation_id) ?></td>
                <td><?= h($projectDetails->sub_status_id) ?></td>
                <td><?= h($projectDetails->priority_id) ?></td>
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

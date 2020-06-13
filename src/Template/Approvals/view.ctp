<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Approval $approval
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Approval'), ['action' => 'edit', $approval->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Approval'), ['action' => 'delete', $approval->id], ['confirm' => __('Are you sure you want to delete # {0}?', $approval->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Approvals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Approval'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="approvals view large-9 medium-8 columns content">
    <h3><?= h($approval->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $approval->has('project') ? $this->Html->link($approval->project->name, ['controller' => 'Projects', 'action' => 'view', $approval->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Approval') ?></th>
            <td><?= h($approval->project_approval) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Approval') ?></th>
            <td><?= h($approval->design_approval) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Documents Approval') ?></th>
            <td><?= h($approval->documents_approval) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($approval->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($approval->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($approval->modified) ?></td>
        </tr>
    </table>
</div>

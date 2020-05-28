<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disbursement $disbursement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Disbursement'), ['action' => 'edit', $disbursement->disbursement_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Disbursement'), ['action' => 'delete', $disbursement->disbursement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $disbursement->disbursement_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Disbursements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Disbursement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Milestones'), ['controller' => 'Milestones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Milestone'), ['controller' => 'Milestones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="disbursements view large-9 medium-8 columns content">
    <h3><?= h($disbursement->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $disbursement->has('project') ? $this->Html->link($disbursement->project->name, ['controller' => 'Projects', 'action' => 'view', $disbursement->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Milestone') ?></th>
            <td><?= $disbursement->has('milestone') ? $this->Html->link($disbursement->milestone->description, ['controller' => 'Milestones', 'action' => 'view', $disbursement->milestone->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($disbursement->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($disbursement->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $disbursement->has('user') ? $this->Html->link($disbursement->user->username, ['controller' => 'Users', 'action' => 'view', $disbursement->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disbursement Id') ?></th>
            <td><?= $this->Number->format($disbursement->disbursement_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Percentage Completion') ?></th>
            <td><?= $this->Number->format($disbursement->percentage_completion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($disbursement->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($disbursement->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($disbursement->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($disbursement->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Updated') ?></th>
            <td><?= h($disbursement->last_updated) ?></td>
        </tr>
    </table>
</div>

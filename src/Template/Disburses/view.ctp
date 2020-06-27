<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disburse $disburse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Disburse'), ['action' => 'edit', $disburse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Disburse'), ['action' => 'delete', $disburse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disburse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Disburses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Disburse'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="disburses view large-9 medium-8 columns content">
    <h3><?= h($disburse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $disburse->has('project') ? $this->Html->link($disburse->project->name, ['controller' => 'Projects', 'action' => 'view', $disburse->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Of Funding') ?></th>
            <td><?= h($disburse->source_of_funding) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($disburse->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($disburse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($disburse->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($disburse->date) ?></td>
        </tr>
    </table>
</div>

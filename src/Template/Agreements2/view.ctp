<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agreement $agreement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Agreement'), ['action' => 'edit', $agreement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Agreement'), ['action' => 'delete', $agreement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agreement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Agreements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agreement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="agreements view large-9 medium-8 columns content">
    <h3><?= h($agreement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $agreement->has('project') ? $this->Html->link($agreement->project->name, ['controller' => 'Projects', 'action' => 'view', $agreement->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor') ?></th>
            <td><?= h($agreement->sponsor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Donor') ?></th>
            <td><?= h($agreement->donor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mda') ?></th>
            <td><?= h($agreement->mda) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approved') ?></th>
            <td><?= h($agreement->approved) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($agreement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Completed Date') ?></th>
            <td><?= h($agreement->completed_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($agreement->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($agreement->modified) ?></td>
        </tr>
    </table>
</div>

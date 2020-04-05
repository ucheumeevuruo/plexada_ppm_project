<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimWorkPlan $pimWorkPlan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim Work Plan'), ['action' => 'edit', $pimWorkPlan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim Work Plan'), ['action' => 'delete', $pimWorkPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimWorkPlan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pim Work Plans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Work Plan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pimWorkPlans view large-9 medium-8 columns content">
    <h3><?= h($pimWorkPlan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pim') ?></th>
            <td><?= $pimWorkPlan->has('pim') ? $this->Html->link($pimWorkPlan->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimWorkPlan->pim->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parties') ?></th>
            <td><?= h($pimWorkPlan->parties) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsibilities') ?></th>
            <td><?= h($pimWorkPlan->responsibilities) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Targets') ?></th>
            <td><?= h($pimWorkPlan->targets) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pimWorkPlan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Financial Cost') ?></th>
            <td><?= $this->Number->format($pimWorkPlan->financial_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($pimWorkPlan->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($pimWorkPlan->end_date) ?></td>
        </tr>
    </table>
</div>

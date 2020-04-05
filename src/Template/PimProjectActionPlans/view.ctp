<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimProjectActionPlan $pimProjectActionPlan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim Project Action Plan'), ['action' => 'edit', $pimProjectActionPlan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim Project Action Plan'), ['action' => 'delete', $pimProjectActionPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimProjectActionPlan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pim Project Action Plans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Project Action Plan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pimProjectActionPlans view large-9 medium-8 columns content">
    <h3><?= h($pimProjectActionPlan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pim') ?></th>
            <td><?= $pimProjectActionPlan->has('pim') ? $this->Html->link($pimProjectActionPlan->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimProjectActionPlan->pim->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activities') ?></th>
            <td><?= h($pimProjectActionPlan->activities) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($pimProjectActionPlan->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsible Party') ?></th>
            <td><?= h($pimProjectActionPlan->responsible_party) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dependency') ?></th>
            <td><?= h($pimProjectActionPlan->dependency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pimProjectActionPlan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plan Start Date') ?></th>
            <td><?= h($pimProjectActionPlan->plan_start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plan End Date') ?></th>
            <td><?= h($pimProjectActionPlan->plan_end_date) ?></td>
        </tr>
    </table>
</div>

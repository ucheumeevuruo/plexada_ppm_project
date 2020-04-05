<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimProgressReport $pimProgressReport
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim Progress Report'), ['action' => 'edit', $pimProgressReport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim Progress Report'), ['action' => 'delete', $pimProgressReport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimProgressReport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pim Progress Reports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Progress Report'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pimProgressReports view large-9 medium-8 columns content">
    <h3><?= h($pimProgressReport->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pim') ?></th>
            <td><?= $pimProgressReport->has('pim') ? $this->Html->link($pimProgressReport->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimProgressReport->pim->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Progress Category') ?></th>
            <td><?= h($pimProgressReport->progress_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Progress Currency') ?></th>
            <td><?= h($pimProgressReport->progress_currency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disbursed Current Semester') ?></th>
            <td><?= h($pimProgressReport->disbursed_current_semester) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cumulated Disbursement') ?></th>
            <td><?= h($pimProgressReport->cumulated_disbursement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pimProgressReport->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Credit Allocation') ?></th>
            <td><?= $this->Number->format($pimProgressReport->amount_credit_allocation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Disbursed') ?></th>
            <td><?= h($pimProgressReport->date_disbursed) ?></td>
        </tr>
    </table>
</div>

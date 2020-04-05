<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimTotalExpenditure $pimTotalExpenditure
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim Total Expenditure'), ['action' => 'edit', $pimTotalExpenditure->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim Total Expenditure'), ['action' => 'delete', $pimTotalExpenditure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimTotalExpenditure->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pim Total Expenditures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Total Expenditure'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pimTotalExpenditures view large-9 medium-8 columns content">
    <h3><?= h($pimTotalExpenditure->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pim') ?></th>
            <td><?= $pimTotalExpenditure->has('pim') ? $this->Html->link($pimTotalExpenditure->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimTotalExpenditure->pim->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pimTotalExpenditure->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Expenditure') ?></th>
            <td><?= $this->Number->format($pimTotalExpenditure->total_expenditure) ?></td>
        </tr>
    </table>
</div>

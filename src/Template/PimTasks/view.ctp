<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimTask $pimTask
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim Task'), ['action' => 'edit', $pimTask->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim Task'), ['action' => 'delete', $pimTask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimTask->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pim Tasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Task'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pimTasks view large-9 medium-8 columns content">
    <h3><?= h($pimTask->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Task') ?></th>
            <td><?= h($pimTask->task) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pim') ?></th>
            <td><?= $pimTask->has('pim') ? $this->Html->link($pimTask->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimTask->pim->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pimTask->id) ?></td>
        </tr>
    </table>
</div>

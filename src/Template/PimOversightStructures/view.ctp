<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimOversightStructure $pimOversightStructure
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim Oversight Structure'), ['action' => 'edit', $pimOversightStructure->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim Oversight Structure'), ['action' => 'delete', $pimOversightStructure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimOversightStructure->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pim Oversight Structures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Oversight Structure'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pimOversightStructures view large-9 medium-8 columns content">
    <h3><?= h($pimOversightStructure->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pim') ?></th>
            <td><?= $pimOversightStructure->has('pim') ? $this->Html->link($pimOversightStructure->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimOversightStructure->pim->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Oversight Level') ?></th>
            <td><?= h($pimOversightStructure->oversight_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Oversight Agency Mda') ?></th>
            <td><?= h($pimOversightStructure->oversight_agency_mda) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pimOversightStructure->id) ?></td>
        </tr>
    </table>
</div>

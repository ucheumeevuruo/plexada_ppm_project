<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadObjective $padObjective
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pad Objective'), ['action' => 'edit', $padObjective->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pad Objective'), ['action' => 'delete', $padObjective->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padObjective->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pad Objectives'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Objective'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="padObjectives view large-9 medium-8 columns content">
    <h3><?= h($padObjective->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pad') ?></th>
            <td><?= $padObjective->has('pad') ? $this->Html->link($padObjective->pad->id, ['controller' => 'Pads', 'action' => 'view', $padObjective->pad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specific Objective') ?></th>
            <td><?= h($padObjective->specific_objective) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Indicator') ?></th>
            <td><?= h($padObjective->first_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Second Indicator') ?></th>
            <td><?= h($padObjective->second_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Third Indicator') ?></th>
            <td><?= h($padObjective->third_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forth Indicator') ?></th>
            <td><?= h($padObjective->forth_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fifth Indicator') ?></th>
            <td><?= h($padObjective->fifth_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sixth Indicator') ?></th>
            <td><?= h($padObjective->sixth_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('M E Method') ?></th>
            <td><?= h($padObjective->m_e_method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Critical Assumptions') ?></th>
            <td><?= h($padObjective->critical_assumptions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($padObjective->id) ?></td>
        </tr>
    </table>
</div>

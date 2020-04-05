<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadActivitiesMean $padActivitiesMean
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pad Activities Mean'), ['action' => 'edit', $padActivitiesMean->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pad Activities Mean'), ['action' => 'delete', $padActivitiesMean->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padActivitiesMean->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pad Activities Means'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Activities Mean'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="padActivitiesMeans view large-9 medium-8 columns content">
    <h3><?= h($padActivitiesMean->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pad') ?></th>
            <td><?= $padActivitiesMean->has('pad') ? $this->Html->link($padActivitiesMean->pad->id, ['controller' => 'Pads', 'action' => 'view', $padActivitiesMean->pad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specific Objective') ?></th>
            <td><?= h($padActivitiesMean->specific_objective) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Indicator') ?></th>
            <td><?= h($padActivitiesMean->first_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Second Indicator') ?></th>
            <td><?= h($padActivitiesMean->second_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Third Indicator') ?></th>
            <td><?= h($padActivitiesMean->third_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forth Indicator') ?></th>
            <td><?= h($padActivitiesMean->forth_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fifth Indicator') ?></th>
            <td><?= h($padActivitiesMean->fifth_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sixth Indicator') ?></th>
            <td><?= h($padActivitiesMean->sixth_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('M E Method') ?></th>
            <td><?= h($padActivitiesMean->m_e_method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Critical Assumptions') ?></th>
            <td><?= h($padActivitiesMean->critical_assumptions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($padActivitiesMean->id) ?></td>
        </tr>
    </table>
</div>

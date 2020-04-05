<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadAchievement $padAchievement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pad Achievement'), ['action' => 'edit', $padAchievement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pad Achievement'), ['action' => 'delete', $padAchievement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padAchievement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pad Achievements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Achievement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="padAchievements view large-9 medium-8 columns content">
    <h3><?= h($padAchievement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pad') ?></th>
            <td><?= $padAchievement->has('pad') ? $this->Html->link($padAchievement->pad->id, ['controller' => 'Pads', 'action' => 'view', $padAchievement->pad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specific Objective') ?></th>
            <td><?= h($padAchievement->specific_objective) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Indicator') ?></th>
            <td><?= h($padAchievement->first_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Second Indicator') ?></th>
            <td><?= h($padAchievement->second_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Third Indicator') ?></th>
            <td><?= h($padAchievement->third_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forth Indicator') ?></th>
            <td><?= h($padAchievement->forth_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fifth Indicator') ?></th>
            <td><?= h($padAchievement->fifth_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sixth Indicator') ?></th>
            <td><?= h($padAchievement->sixth_indicator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('M E Method') ?></th>
            <td><?= h($padAchievement->m_e_method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Critical Assumptions') ?></th>
            <td><?= h($padAchievement->critical assumptions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($padAchievement->id) ?></td>
        </tr>
    </table>
</div>

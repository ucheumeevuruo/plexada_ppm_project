<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadCosting $padCosting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pad Costing'), ['action' => 'edit', $padCosting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pad Costing'), ['action' => 'delete', $padCosting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padCosting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pad Costings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Costing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="padCostings view large-9 medium-8 columns content">
    <h3><?= h($padCosting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pad') ?></th>
            <td><?= $padCosting->has('pad') ? $this->Html->link($padCosting->pad->id, ['controller' => 'Pads', 'action' => 'view', $padCosting->pad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Amount') ?></th>
            <td><?= h($padCosting->project_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Currency') ?></th>
            <td><?= h($padCosting->currency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Outcome') ?></th>
            <td><?= h($padCosting->expected_outcome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($padCosting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Due Date') ?></th>
            <td><?= h($padCosting->due_date) ?></td>
        </tr>
    </table>
</div>

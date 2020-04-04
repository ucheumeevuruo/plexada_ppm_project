<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milestone $milestone
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Milestone'), ['action' => 'edit', $milestone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Milestone'), ['action' => 'delete', $milestone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milestone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Milestones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Milestone'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="milestones view large-9 medium-8 columns content">
    <h3><?= h($milestone->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Record Number') ?></th>
            <td><?= h($milestone->record_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Detail') ?></th>
            <td><?= $milestone->has('project_detail') ? $this->Html->link($milestone->project_detail->id, ['controller' => 'ProjectDetails', 'action' => 'view', $milestone->project_detail->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment') ?></th>
            <td><?= h($milestone->payment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lov') ?></th>
            <td><?= $milestone->has('lov') ? $this->Html->link($milestone->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $milestone->lov->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($milestone->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Achievement') ?></th>
            <td><?= h($milestone->achievement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($milestone->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($milestone->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Completion Date') ?></th>
            <td><?= h($milestone->expected_completion_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($milestone->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($milestone->modified) ?></td>
        </tr>
    </table>
</div>

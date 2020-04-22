<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectObjective $projectObjective
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Objective'), ['action' => 'edit', $projectObjective->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Objective'), ['action' => 'delete', $projectObjective->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectObjective->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Objectives'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Objective'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectObjectives view large-9 medium-8 columns content">
    <h3><?= h($projectObjective->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= h($projectObjective->priority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Impact') ?></th>
            <td><?= h($projectObjective->impact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('System User Id') ?></th>
            <td><?= h($projectObjective->system_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectObjective->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Id') ?></th>
            <td><?= $this->Number->format($projectObjective->project_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($projectObjective->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Updated') ?></th>
            <td><?= h($projectObjective->last_updated) ?></td>
        </tr>
    </table>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectMilestone $projectMilestone
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Milestone'), ['action' => 'edit', $projectMilestone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Milestone'), ['action' => 'delete', $projectMilestone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectMilestone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Milestones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Milestone'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectMilestones view large-9 medium-8 columns content">
    <h3><?= h($projectMilestone->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($projectMilestone->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($projectMilestone->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($projectMilestone->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectMilestone->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Id') ?></th>
            <td><?= $this->Number->format($projectMilestone->project_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($projectMilestone->created_at) ?></td>
        </tr>
    </table>
</div>

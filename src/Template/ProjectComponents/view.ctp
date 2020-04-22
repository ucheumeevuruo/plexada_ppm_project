<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectComponent $projectComponent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Component'), ['action' => 'edit', $projectComponent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Component'), ['action' => 'delete', $projectComponent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectComponent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Components'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Component'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectComponents view large-9 medium-8 columns content">
    <h3><?= h($projectComponent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $projectComponent->has('project') ? $this->Html->link($projectComponent->project->name, ['controller' => 'Projects', 'action' => 'view', $projectComponent->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectComponent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Component') ?></th>
            <td><?= $this->Number->format($projectComponent->component) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($projectComponent->cost) ?></td>
        </tr>
    </table>
</div>

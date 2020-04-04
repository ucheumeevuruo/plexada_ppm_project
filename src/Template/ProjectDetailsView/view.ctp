<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailsView $projectDetailsView
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Details View'), ['action' => 'edit', $projectDetailsView->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Details View'), ['action' => 'delete', $projectDetailsView->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetailsView->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Details View'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Details View'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectDetailsView view large-9 medium-8 columns content">
    <h3><?= h($projectDetailsView->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($projectDetailsView->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($projectDetailsView->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waiting On') ?></th>
            <td><?= h($projectDetailsView->waiting_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= h($projectDetailsView->priority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lov') ?></th>
            <td><?= $projectDetailsView->has('lov') ? $this->Html->link($projectDetailsView->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $projectDetailsView->lov->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Status') ?></th>
            <td><?= h($projectDetailsView->Sub Status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectDetailsView->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Exp 3') ?></th>
            <td><?= $this->Number->format($projectDetailsView->Name_exp_3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Budget') ?></th>
            <td><?= $this->Number->format($projectDetailsView->budget) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waiting Since') ?></th>
            <td><?= h($projectDetailsView->waiting_since) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Dt') ?></th>
            <td><?= h($projectDetailsView->start_dt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Dt') ?></th>
            <td><?= h($projectDetailsView->end_dt) ?></td>
        </tr>
    </table>
</div>

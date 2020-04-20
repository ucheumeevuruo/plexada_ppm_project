<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Project Fundings'), ['controller' => 'ProjectFundings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Funding'), ['controller' => 'ProjectFundings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Annotations'), ['controller' => 'Annotations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Annotation'), ['controller' => 'Annotations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Milestones'), ['controller' => 'Milestones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Milestone'), ['controller' => 'Milestones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Objectives'), ['controller' => 'Objectives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Objective'), ['controller' => 'Objectives', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Project Milestones'), ['controller' => 'ProjectMilestones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Milestone'), ['controller' => 'ProjectMilestones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Project Objectives'), ['controller' => 'ProjectObjectives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Objective'), ['controller' => 'ProjectObjectives', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Risk Issues'), ['controller' => 'RiskIssues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Risk Issue'), ['controller' => 'RiskIssues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projects index large-9 medium-8 columns content">
    <h3><?= __('Projects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('introduction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_detail_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pim_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_funding_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?= $this->Number->format($project->id) ?></td>
                <td><?= h($project->name) ?></td>
                <td><?= h($project->introduction) ?></td>
                <td><?= h($project->location) ?></td>
                <td><?= $this->Number->format($project->cost) ?></td>
                <td><?= $this->Number->format($project->project_detail_id) ?></td>
                <td><?= $project->has('pim') ? $this->Html->link($project->pim->id, ['controller' => 'Pims', 'action' => 'view', $project->pim->id]) : '' ?></td>
                <td><?= $project->has('project_funding') ? $this->Html->link($project->project_funding->id, ['controller' => 'ProjectFundings', 'action' => 'view', $project->project_funding->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

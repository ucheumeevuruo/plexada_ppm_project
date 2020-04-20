<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?></li>
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
<div class="projects form large-9 medium-8 columns content">
    <?= $this->Form->create($project) ?>
    <fieldset>
        <legend><?= __('Add Project') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('introduction');
            echo $this->Form->control('location');
            echo $this->Form->control('cost');
            echo $this->Form->control('project_detail_id');
            echo $this->Form->control('pim_id', ['options' => $pims]);
            echo $this->Form->control('project_funding_id', ['options' => $projectFundings]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

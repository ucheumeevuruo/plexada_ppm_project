<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milestone $milestone
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $milestone->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $milestone->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Milestones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="milestones form large-9 medium-8 columns content">
    <?= $this->Form->create($milestone) ?>
    <fieldset>
        <legend><?= __('Edit Milestone') ?></legend>
        <?php
            echo $this->Form->control('record_number');
            echo $this->Form->control('project_id', ['options' => $projectDetails]);
            echo $this->Form->control('amount');
            echo $this->Form->control('payment');
            echo $this->Form->control('status_id', ['options' => $lov]);
            echo $this->Form->control('description');
            echo $this->Form->control('achievement');
            echo $this->Form->control('trigger_id', ['options' => $triggers, 'empty' => true]);
            echo $this->Form->control('completed_date', ['empty' => true]);
            echo $this->Form->control('expected_completion_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

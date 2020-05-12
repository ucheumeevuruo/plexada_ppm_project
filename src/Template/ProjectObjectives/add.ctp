<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectObjective $projectObjective
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Project Objectives'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="projectObjectives form large-9 medium-8 columns content">
    <?= $this->Form->create($projectObjective) ?>
    <fieldset>
        <legend><?= __('Add Project Objective') ?></legend>
        <?php
            echo $this->Form->control('project_id');
            echo $this->Form->control('priority');
            echo $this->Form->control('impact');
            echo $this->Form->control('last_updated');
            echo $this->Form->control('system_user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

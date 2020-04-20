<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectMilestone $projectMilestone
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Project Milestones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="projectMilestones form large-9 medium-8 columns content">
    <?= $this->Form->create($projectMilestone) ?>
    <fieldset>
        <legend><?= __('Add Project Milestone') ?></legend>
        <?php
            echo $this->Form->control('project_id');
            echo $this->Form->control('status');
            echo $this->Form->control('description');
            echo $this->Form->control('created_at');
            echo $this->Form->control('duration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

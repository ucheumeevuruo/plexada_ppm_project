<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectFunding $projectFunding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectFunding->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectFunding->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Project Fundings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Milestones'), ['controller' => 'Milestones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Milestone'), ['controller' => 'Milestones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectFundings form large-9 medium-8 columns content">
    <?= $this->Form->create($projectFunding) ?>
    <fieldset>
        <legend><?= __('Edit Project Funding') ?></legend>
        <?php
            echo $this->Form->control('milestone_id', ['options' => $milestones]);
            echo $this->Form->control('funding');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailsView $projectDetailsView
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectDetailsView->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetailsView->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Project Details View'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectDetailsView form large-9 medium-8 columns content">
    <?= $this->Form->create($projectDetailsView) ?>
    <fieldset>
        <legend><?= __('Edit Project Details View') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('Description');
            echo $this->Form->control('Name_exp_3');
            echo $this->Form->control('waiting_since', ['empty' => true]);
            echo $this->Form->control('waiting_on');
            echo $this->Form->control('priority');
            echo $this->Form->control('status_id', ['options' => $lov]);
            echo $this->Form->control('budget');
            echo $this->Form->control('start_dt', ['empty' => true]);
            echo $this->Form->control('end_dt', ['empty' => true]);
            echo $this->Form->control('Sub Status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

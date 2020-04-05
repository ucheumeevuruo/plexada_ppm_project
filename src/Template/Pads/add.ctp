<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pad $pad
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pad Achievements'), ['controller' => 'PadAchievements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Achievement'), ['controller' => 'PadAchievements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pad Activities Means'), ['controller' => 'PadActivitiesMeans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Activities Mean'), ['controller' => 'PadActivitiesMeans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pad Costings'), ['controller' => 'PadCostings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Costing'), ['controller' => 'PadCostings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pad Credit Facility Agreements'), ['controller' => 'PadCreditFacilityAgreements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Credit Facility Agreement'), ['controller' => 'PadCreditFacilityAgreements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pad Objectives'), ['controller' => 'PadObjectives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Objective'), ['controller' => 'PadObjectives', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pads form large-9 medium-8 columns content">
    <?= $this->Form->create($pad) ?>
    <fieldset>
        <legend><?= __('Add Pad') ?></legend>
        <?php
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('brief');
            echo $this->Form->control('key_players');
            echo $this->Form->control('project_type');
            echo $this->Form->control('project_target');
            echo $this->Form->control('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

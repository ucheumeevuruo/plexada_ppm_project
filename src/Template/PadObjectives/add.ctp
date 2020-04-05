<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadObjective $padObjective
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pad Objectives'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padObjectives form large-9 medium-8 columns content">
    <?= $this->Form->create($padObjective) ?>
    <fieldset>
        <legend><?= __('Add Pad Objective') ?></legend>
        <?php
            echo $this->Form->control('pad_id', ['options' => $pads]);
            echo $this->Form->control('specific_objective');
            echo $this->Form->control('first_indicator');
            echo $this->Form->control('second_indicator');
            echo $this->Form->control('third_indicator');
            echo $this->Form->control('forth_indicator');
            echo $this->Form->control('fifth_indicator');
            echo $this->Form->control('sixth_indicator');
            echo $this->Form->control('m_e_method');
            echo $this->Form->control('critical_assumptions');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

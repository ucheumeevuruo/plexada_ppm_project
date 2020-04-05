<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimProjectComponent $pimProjectComponent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pim Project Components'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimProjectComponents form large-9 medium-8 columns content">
    <?= $this->Form->create($pimProjectComponent) ?>
    <fieldset>
        <legend><?= __('Add Pim Project Component') ?></legend>
        <?php
            echo $this->Form->control('pim_id', ['options' => $pims]);
            echo $this->Form->control('activities_achievements');
            echo $this->Form->control('risks_mitigations');
            echo $this->Form->control('activity_next_semester');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

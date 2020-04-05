<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimProjectActionPlan $pimProjectActionPlan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pim Project Action Plans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimProjectActionPlans form large-9 medium-8 columns content">
    <?= $this->Form->create($pimProjectActionPlan) ?>
    <fieldset>
        <legend><?= __('Add Pim Project Action Plan') ?></legend>
        <?php
            echo $this->Form->control('pim_id', ['options' => $pims]);
            echo $this->Form->control('activities');
            echo $this->Form->control('action');
            echo $this->Form->control('responsible_party');
            echo $this->Form->control('plan_start_date');
            echo $this->Form->control('plan_end_date');
            echo $this->Form->control('dependency');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimWorkPlan $pimWorkPlan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pim Work Plans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimWorkPlans form large-9 medium-8 columns content">
    <?= $this->Form->create($pimWorkPlan) ?>
    <fieldset>
        <legend><?= __('Add Pim Work Plan') ?></legend>
        <?php
            echo $this->Form->control('pim_id', ['options' => $pims]);
            echo $this->Form->control('parties');
            echo $this->Form->control('responsibilities');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('financial_cost');
            echo $this->Form->control('targets');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

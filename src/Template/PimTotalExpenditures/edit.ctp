<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimTotalExpenditure $pimTotalExpenditure
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pimTotalExpenditure->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pimTotalExpenditure->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pim Total Expenditures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimTotalExpenditures form large-9 medium-8 columns content">
    <?= $this->Form->create($pimTotalExpenditure) ?>
    <fieldset>
        <legend><?= __('Edit Pim Total Expenditure') ?></legend>
        <?php
            echo $this->Form->control('pim_id', ['options' => $pims]);
            echo $this->Form->control('total_expenditure');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

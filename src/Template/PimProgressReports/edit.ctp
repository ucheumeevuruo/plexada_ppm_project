<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimProgressReport $pimProgressReport
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pimProgressReport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pimProgressReport->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pim Progress Reports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimProgressReports form large-9 medium-8 columns content">
    <?= $this->Form->create($pimProgressReport) ?>
    <fieldset>
        <legend><?= __('Edit Pim Progress Report') ?></legend>
        <?php
            echo $this->Form->control('pim_id', ['options' => $pims]);
            echo $this->Form->control('progress_category');
            echo $this->Form->control('progress_currency');
            echo $this->Form->control('amount_credit_allocation');
            echo $this->Form->control('disbursed_current_semester');
            echo $this->Form->control('date_disbursed');
            echo $this->Form->control('cumulated_disbursement');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

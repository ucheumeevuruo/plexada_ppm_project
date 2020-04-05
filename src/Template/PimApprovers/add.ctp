<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimApprover $pimApprover
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pim Approvers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pimApprovers form large-9 medium-8 columns content">
    <?= $this->Form->create($pimApprover) ?>
    <fieldset>
        <legend><?= __('Add Pim Approver') ?></legend>
        <?php
            echo $this->Form->control('approvers_agency');
            echo $this->Form->control('approvers_rep_information');
            echo $this->Form->control('approvers_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

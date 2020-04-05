<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimApprover $pimApprover
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pimApprover->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pimApprover->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pim Approvers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pimApprovers form large-9 medium-8 columns content">
    <?= $this->Form->create($pimApprover) ?>
    <fieldset>
        <legend><?= __('Edit Pim Approver') ?></legend>
        <?php
            echo $this->Form->control('approvers_agency');
            echo $this->Form->control('approvers_rep_information');
            echo $this->Form->control('approvers_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

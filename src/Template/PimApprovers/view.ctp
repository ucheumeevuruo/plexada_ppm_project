<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimApprover $pimApprover
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim Approver'), ['action' => 'edit', $pimApprover->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim Approver'), ['action' => 'delete', $pimApprover->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimApprover->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pim Approvers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Approver'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pimApprovers view large-9 medium-8 columns content">
    <h3><?= h($pimApprover->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Approvers Agency') ?></th>
            <td><?= h($pimApprover->approvers_agency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approvers Rep Information') ?></th>
            <td><?= h($pimApprover->approvers_rep_information) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pimApprover->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approvers Date') ?></th>
            <td><?= h($pimApprover->approvers_date) ?></td>
        </tr>
    </table>
</div>

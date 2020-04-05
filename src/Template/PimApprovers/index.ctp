<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimApprover[]|\Cake\Collection\CollectionInterface $pimApprovers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pim Approver'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimApprovers index large-9 medium-8 columns content">
    <h3><?= __('Pim Approvers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approvers_agency') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approvers_rep_information') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approvers_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pimApprovers as $pimApprover): ?>
            <tr>
                <td><?= $this->Number->format($pimApprover->id) ?></td>
                <td><?= h($pimApprover->approvers_agency) ?></td>
                <td><?= h($pimApprover->approvers_rep_information) ?></td>
                <td><?= h($pimApprover->approvers_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pimApprover->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pimApprover->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pimApprover->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimApprover->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

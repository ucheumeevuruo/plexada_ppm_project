<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimTotalExpenditure[]|\Cake\Collection\CollectionInterface $pimTotalExpenditures
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pim Total Expenditure'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimTotalExpenditures index large-9 medium-8 columns content">
    <h3><?= __('Pim Total Expenditures') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pim_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_expenditure') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pimTotalExpenditures as $pimTotalExpenditure): ?>
            <tr>
                <td><?= $this->Number->format($pimTotalExpenditure->id) ?></td>
                <td><?= $pimTotalExpenditure->has('pim') ? $this->Html->link($pimTotalExpenditure->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimTotalExpenditure->pim->id]) : '' ?></td>
                <td><?= $this->Number->format($pimTotalExpenditure->total_expenditure) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pimTotalExpenditure->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pimTotalExpenditure->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pimTotalExpenditure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimTotalExpenditure->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimProgressReport[]|\Cake\Collection\CollectionInterface $pimProgressReports
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pim Progress Report'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimProgressReports index large-9 medium-8 columns content">
    <h3><?= __('Pim Progress Reports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pim_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('progress_category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('progress_currency') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount_credit_allocation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disbursed_current_semester') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_disbursed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cumulated_disbursement') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pimProgressReports as $pimProgressReport): ?>
            <tr>
                <td><?= $this->Number->format($pimProgressReport->id) ?></td>
                <td><?= $pimProgressReport->has('pim') ? $this->Html->link($pimProgressReport->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimProgressReport->pim->id]) : '' ?></td>
                <td><?= h($pimProgressReport->progress_category) ?></td>
                <td><?= h($pimProgressReport->progress_currency) ?></td>
                <td><?= $this->Number->format($pimProgressReport->amount_credit_allocation) ?></td>
                <td><?= h($pimProgressReport->disbursed_current_semester) ?></td>
                <td><?= h($pimProgressReport->date_disbursed) ?></td>
                <td><?= h($pimProgressReport->cumulated_disbursement) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pimProgressReport->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pimProgressReport->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pimProgressReport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimProgressReport->id)]) ?>
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

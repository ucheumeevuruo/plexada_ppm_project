<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimCategory[]|\Cake\Collection\CollectionInterface $pimCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pim Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimCategories index large-9 medium-8 columns content">
    <h3><?= __('Pim Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('owner') ?></th>
                <th scope="col"><?= $this->Paginator->sort('currency') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disbursed_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_output_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pimCategories as $pimCategory): ?>
            <tr>
                <td><?= $this->Number->format($pimCategory->id) ?></td>
                <td><?= h($pimCategory->category) ?></td>
                <td><?= h($pimCategory->owner) ?></td>
                <td><?= h($pimCategory->currency) ?></td>
                <td><?= $this->Number->format($pimCategory->disbursed_amount) ?></td>
                <td><?= h($pimCategory->expected_output_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pimCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pimCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pimCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimCategory->id)]) ?>
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

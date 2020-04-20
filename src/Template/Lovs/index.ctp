<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lov[]|\Cake\Collection\CollectionInterface $lovs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lov'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lovs index large-9 medium-8 columns content">
    <h3><?= __('Lovs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lov_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lov_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('system_user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lovs as $lov): ?>
            <tr>
                <td><?= $this->Number->format($lov->id) ?></td>
                <td><?= h($lov->lov_type) ?></td>
                <td><?= h($lov->lov_value) ?></td>
                <td><?= h($lov->created) ?></td>
                <td><?= h($lov->last_updated) ?></td>
                <td><?= h($lov->system_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lov->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lov->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lov->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lov->id)]) ?>
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

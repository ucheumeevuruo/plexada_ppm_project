<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disburse[]|\Cake\Collection\CollectionInterface $disburses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Disburse'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="disburses index large-9 medium-8 columns content">
    <h3><?= __('Disburses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_of_funding') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($disburses as $disburse): ?>
            <tr>
                <td><?= $this->Number->format($disburse->id) ?></td>
                <td><?= $disburse->has('project') ? $this->Html->link($disburse->project->name, ['controller' => 'Projects', 'action' => 'view', $disburse->project->id]) : '' ?></td>
                <td><?= h($disburse->source_of_funding) ?></td>
                <td><?= $this->Number->format($disburse->amount) ?></td>
                <td><?= h($disburse->date) ?></td>
                <td><?= h($disburse->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $disburse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $disburse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $disburse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disburse->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Approval[]|\Cake\Collection\CollectionInterface $approvals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Approval'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="approvals index large-9 medium-8 columns content">
    <h3><?= __('Approvals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_approval') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_approval') ?></th>
                <th scope="col"><?= $this->Paginator->sort('documents_approval') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($approvals as $approval): ?>
            <tr>
                <td><?= $this->Number->format($approval->id) ?></td>
                <td><?= $approval->has('project') ? $this->Html->link($approval->project->name, ['controller' => 'Projects', 'action' => 'view', $approval->project->id]) : '' ?></td>
                <td><?= h($approval->project_approval) ?></td>
                <td><?= h($approval->design_approval) ?></td>
                <td><?= h($approval->documents_approval) ?></td>
                <td><?= h($approval->created) ?></td>
                <td><?= h($approval->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $approval->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $approval->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $approval->id], ['confirm' => __('Are you sure you want to delete # {0}?', $approval->id)]) ?>
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

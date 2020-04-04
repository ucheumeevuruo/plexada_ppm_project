<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milestone[]|\Cake\Collection\CollectionInterface $milestones
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Milestone'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="milestones index large-9 medium-8 columns content">
    <h3><?= __('Milestones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('record_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('achievement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_completion_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($milestones as $milestone): ?>
            <tr>
                <td><?= $this->Number->format($milestone->id) ?></td>
                <td><?= h($milestone->record_number) ?></td>
                <td><?= $milestone->has('project_detail') ? $this->Html->link($milestone->project_detail->id, ['controller' => 'ProjectDetails', 'action' => 'view', $milestone->project_detail->id]) : '' ?></td>
                <td><?= $this->Number->format($milestone->amount) ?></td>
                <td><?= h($milestone->payment) ?></td>
                <td><?= $milestone->has('lov') ? $this->Html->link($milestone->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $milestone->lov->id]) : '' ?></td>
                <td><?= h($milestone->description) ?></td>
                <td><?= h($milestone->achievement) ?></td>
                <td><?= h($milestone->expected_completion_date) ?></td>
                <td><?= h($milestone->created) ?></td>
                <td><?= h($milestone->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $milestone->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $milestone->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $milestone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milestone->id)]) ?>
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

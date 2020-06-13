<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agreement[]|\Cake\Collection\CollectionInterface $agreements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Agreement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="agreements index large-9 medium-8 columns content">
    <h3><?= __('Agreements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsor_agreement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('donor_agreement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mda_agreement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_documents') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approve_documents') ?></th>
                <th scope="col"><?= $this->Paginator->sort('approve_project') ?></th>
                <th scope="col"><?= $this->Paginator->sort('completed_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agreements as $agreement): ?>
            <tr>
                <td><?= $this->Number->format($agreement->id) ?></td>
                <td><?= $agreement->has('project') ? $this->Html->link($agreement->project->name, ['controller' => 'Projects', 'action' => 'view', $agreement->project->id]) : '' ?></td>
                <td><?= h($agreement->sponsor_agreement) ?></td>
                <td><?= h($agreement->donor_agreement) ?></td>
                <td><?= h($agreement->mda_agreement) ?></td>
                <td><?= h($agreement->other_documents) ?></td>
                <td><?= h($agreement->approve_documents) ?></td>
                <td><?= h($agreement->approve_project) ?></td>
                <td><?= h($agreement->completed_date) ?></td>
                <td><?= h($agreement->created) ?></td>
                <td><?= h($agreement->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $agreement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $agreement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $agreement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agreement->id)]) ?>
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

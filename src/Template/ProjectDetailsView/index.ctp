<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailsView[]|\Cake\Collection\CollectionInterface $projectDetailsView
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project Details View'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectDetailsView index large-9 medium-8 columns content">
    <h3><?= __('Project Details View') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name_exp_3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waiting_since') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waiting_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('budget') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_dt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_dt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Sub Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectDetailsView as $projectDetailsView): ?>
            <tr>
                <td><?= $this->Number->format($projectDetailsView->id) ?></td>
                <td><?= h($projectDetailsView->name) ?></td>
                <td><?= h($projectDetailsView->Description) ?></td>
                <td><?= $this->Number->format($projectDetailsView->Name_exp_3) ?></td>
                <td><?= h($projectDetailsView->waiting_since) ?></td>
                <td><?= h($projectDetailsView->waiting_on) ?></td>
                <td><?= h($projectDetailsView->priority) ?></td>
                <td><?= $projectDetailsView->has('lov') ? $this->Html->link($projectDetailsView->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $projectDetailsView->lov->id]) : '' ?></td>
                <td><?= $this->Number->format($projectDetailsView->budget) ?></td>
                <td><?= h($projectDetailsView->start_dt) ?></td>
                <td><?= h($projectDetailsView->end_dt) ?></td>
                <td><?= h($projectDetailsView->Sub Status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectDetailsView->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectDetailsView->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectDetailsView->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetailsView->id)]) ?>
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

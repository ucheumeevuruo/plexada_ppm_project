<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectObjective[]|\Cake\Collection\CollectionInterface $projectObjectives
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project Objective'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectObjectives index large-9 medium-8 columns content">
    <h3><?= __('Project Objectives') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('system_user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectObjectives as $projectObjective): ?>
            <tr>
                <td><?= $this->Number->format($projectObjective->id) ?></td>
                <td><?= $this->Number->format($projectObjective->project_id) ?></td>
                <td><?= h($projectObjective->priority) ?></td>
                <td><?= h($projectObjective->impact) ?></td>
                <td><?= h($projectObjective->created) ?></td>
                <td><?= h($projectObjective->last_updated) ?></td>
                <td><?= h($projectObjective->system_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectObjective->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectObjective->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectObjective->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectObjective->id)]) ?>
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

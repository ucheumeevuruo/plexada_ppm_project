<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectMilestone[]|\Cake\Collection\CollectionInterface $projectMilestones
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project Milestone'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectMilestones index large-9 medium-8 columns content">
    <h3><?= __('Project Milestones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectMilestones as $projectMilestone): ?>
            <tr>
                <td><?= $this->Number->format($projectMilestone->id) ?></td>
                <td><?= $this->Number->format($projectMilestone->project_id) ?></td>
                <td><?= h($projectMilestone->status) ?></td>
                <td><?= h($projectMilestone->description) ?></td>
                <td><?= h($projectMilestone->created_at) ?></td>
                <td><?= h($projectMilestone->duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectMilestone->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectMilestone->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectMilestone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectMilestone->id)]) ?>
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

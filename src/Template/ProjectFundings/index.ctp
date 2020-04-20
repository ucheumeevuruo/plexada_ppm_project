<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectFunding[]|\Cake\Collection\CollectionInterface $projectFundings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project Funding'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Milestones'), ['controller' => 'Milestones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Milestone'), ['controller' => 'Milestones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectFundings index large-9 medium-8 columns content">
    <h3><?= __('Project Fundings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('milestone_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funding') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectFundings as $projectFunding): ?>
            <tr>
                <td><?= $this->Number->format($projectFunding->id) ?></td>
                <td><?= $projectFunding->has('milestone') ? $this->Html->link($projectFunding->milestone->id, ['controller' => 'Milestones', 'action' => 'view', $projectFunding->milestone->id]) : '' ?></td>
                <td><?= $this->Number->format($projectFunding->funding) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectFunding->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectFunding->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectFunding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectFunding->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectComponent[]|\Cake\Collection\CollectionInterface $projectComponents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project Component'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectComponents index large-9 medium-8 columns content">
    <h3><?= __('Project Components') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('component') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectComponents as $projectComponent): ?>
            <tr>
                <td><?= $this->Number->format($projectComponent->id) ?></td>
                <td><?= $this->Number->format($projectComponent->component) ?></td>
                <td><?= $this->Number->format($projectComponent->cost) ?></td>
                <td><?= $projectComponent->has('project') ? $this->Html->link($projectComponent->project->name, ['controller' => 'Projects', 'action' => 'view', $projectComponent->project->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectComponent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectComponent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectComponent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectComponent->id)]) ?>
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

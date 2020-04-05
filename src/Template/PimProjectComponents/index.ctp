<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimProjectComponent[]|\Cake\Collection\CollectionInterface $pimProjectComponents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pim Project Component'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimProjectComponents index large-9 medium-8 columns content">
    <h3><?= __('Pim Project Components') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pim_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activities_achievements') ?></th>
                <th scope="col"><?= $this->Paginator->sort('risks_mitigations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activity_next_semester') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pimProjectComponents as $pimProjectComponent): ?>
            <tr>
                <td><?= $this->Number->format($pimProjectComponent->id) ?></td>
                <td><?= $pimProjectComponent->has('pim') ? $this->Html->link($pimProjectComponent->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimProjectComponent->pim->id]) : '' ?></td>
                <td><?= h($pimProjectComponent->activities_achievements) ?></td>
                <td><?= h($pimProjectComponent->risks_mitigations) ?></td>
                <td><?= h($pimProjectComponent->activity_next_semester) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pimProjectComponent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pimProjectComponent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pimProjectComponent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimProjectComponent->id)]) ?>
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

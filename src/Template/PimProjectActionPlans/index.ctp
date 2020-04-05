<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimProjectActionPlan[]|\Cake\Collection\CollectionInterface $pimProjectActionPlans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pim Project Action Plan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimProjectActionPlans index large-9 medium-8 columns content">
    <h3><?= __('Pim Project Action Plans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pim_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activities') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col"><?= $this->Paginator->sort('responsible_party') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plan_start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plan_end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dependency') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pimProjectActionPlans as $pimProjectActionPlan): ?>
            <tr>
                <td><?= $this->Number->format($pimProjectActionPlan->id) ?></td>
                <td><?= $pimProjectActionPlan->has('pim') ? $this->Html->link($pimProjectActionPlan->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimProjectActionPlan->pim->id]) : '' ?></td>
                <td><?= h($pimProjectActionPlan->activities) ?></td>
                <td><?= h($pimProjectActionPlan->action) ?></td>
                <td><?= h($pimProjectActionPlan->responsible_party) ?></td>
                <td><?= h($pimProjectActionPlan->plan_start_date) ?></td>
                <td><?= h($pimProjectActionPlan->plan_end_date) ?></td>
                <td><?= h($pimProjectActionPlan->dependency) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pimProjectActionPlan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pimProjectActionPlan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pimProjectActionPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimProjectActionPlan->id)]) ?>
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

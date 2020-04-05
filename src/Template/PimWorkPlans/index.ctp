<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimWorkPlan[]|\Cake\Collection\CollectionInterface $pimWorkPlans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pim Work Plan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimWorkPlans index large-9 medium-8 columns content">
    <h3><?= __('Pim Work Plans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pim_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parties') ?></th>
                <th scope="col"><?= $this->Paginator->sort('responsibilities') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('financial_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('targets') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pimWorkPlans as $pimWorkPlan): ?>
            <tr>
                <td><?= $this->Number->format($pimWorkPlan->id) ?></td>
                <td><?= $pimWorkPlan->has('pim') ? $this->Html->link($pimWorkPlan->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimWorkPlan->pim->id]) : '' ?></td>
                <td><?= h($pimWorkPlan->parties) ?></td>
                <td><?= h($pimWorkPlan->responsibilities) ?></td>
                <td><?= h($pimWorkPlan->start_date) ?></td>
                <td><?= h($pimWorkPlan->end_date) ?></td>
                <td><?= $this->Number->format($pimWorkPlan->financial_cost) ?></td>
                <td><?= h($pimWorkPlan->targets) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pimWorkPlan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pimWorkPlan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pimWorkPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimWorkPlan->id)]) ?>
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

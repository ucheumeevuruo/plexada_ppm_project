<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pad[]|\Cake\Collection\CollectionInterface $pads
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pad Achievements'), ['controller' => 'PadAchievements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Achievement'), ['controller' => 'PadAchievements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pad Activities Means'), ['controller' => 'PadActivitiesMeans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Activities Mean'), ['controller' => 'PadActivitiesMeans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pad Costings'), ['controller' => 'PadCostings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Costing'), ['controller' => 'PadCostings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pad Credit Facility Agreements'), ['controller' => 'PadCreditFacilityAgreements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Credit Facility Agreement'), ['controller' => 'PadCreditFacilityAgreements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pad Objectives'), ['controller' => 'PadObjectives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad Objective'), ['controller' => 'PadObjectives', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pads index large-9 medium-8 columns content">
    <h3><?= __('Pads') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brief') ?></th>
                <th scope="col"><?= $this->Paginator->sort('key_players') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_target') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pads as $pad): ?>
            <tr>
                <td><?= $this->Number->format($pad->id) ?></td>
                <td><?= h($pad->date) ?></td>
                <td><?= h($pad->brief) ?></td>
                <td><?= h($pad->key_players) ?></td>
                <td><?= h($pad->project_type) ?></td>
                <td><?= h($pad->project_target) ?></td>
                <td><?= h($pad->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pad->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pad->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pad->id)]) ?>
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

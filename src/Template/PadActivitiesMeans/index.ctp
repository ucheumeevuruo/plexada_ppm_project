<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadActivitiesMean[]|\Cake\Collection\CollectionInterface $padActivitiesMeans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pad Activities Mean'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padActivitiesMeans index large-9 medium-8 columns content">
    <h3><?= __('Pad Activities Means') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pad_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specific_objective') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_indicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('second_indicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('third_indicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('forth_indicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fifth_indicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sixth_indicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('m_e_method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('critical_assumptions') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($padActivitiesMeans as $padActivitiesMean): ?>
            <tr>
                <td><?= $this->Number->format($padActivitiesMean->id) ?></td>
                <td><?= $padActivitiesMean->has('pad') ? $this->Html->link($padActivitiesMean->pad->id, ['controller' => 'Pads', 'action' => 'view', $padActivitiesMean->pad->id]) : '' ?></td>
                <td><?= h($padActivitiesMean->specific_objective) ?></td>
                <td><?= h($padActivitiesMean->first_indicator) ?></td>
                <td><?= h($padActivitiesMean->second_indicator) ?></td>
                <td><?= h($padActivitiesMean->third_indicator) ?></td>
                <td><?= h($padActivitiesMean->forth_indicator) ?></td>
                <td><?= h($padActivitiesMean->fifth_indicator) ?></td>
                <td><?= h($padActivitiesMean->sixth_indicator) ?></td>
                <td><?= h($padActivitiesMean->m_e_method) ?></td>
                <td><?= h($padActivitiesMean->critical_assumptions) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $padActivitiesMean->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $padActivitiesMean->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $padActivitiesMean->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padActivitiesMean->id)]) ?>
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

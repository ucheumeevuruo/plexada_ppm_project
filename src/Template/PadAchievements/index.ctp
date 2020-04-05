<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadAchievement[]|\Cake\Collection\CollectionInterface $padAchievements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pad Achievement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padAchievements index large-9 medium-8 columns content">
    <h3><?= __('Pad Achievements') ?></h3>
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
                <th scope="col"><?= $this->Paginator->sort('critical assumptions') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($padAchievements as $padAchievement): ?>
            <tr>
                <td><?= $this->Number->format($padAchievement->id) ?></td>
                <td><?= $padAchievement->has('pad') ? $this->Html->link($padAchievement->pad->id, ['controller' => 'Pads', 'action' => 'view', $padAchievement->pad->id]) : '' ?></td>
                <td><?= h($padAchievement->specific_objective) ?></td>
                <td><?= h($padAchievement->first_indicator) ?></td>
                <td><?= h($padAchievement->second_indicator) ?></td>
                <td><?= h($padAchievement->third_indicator) ?></td>
                <td><?= h($padAchievement->forth_indicator) ?></td>
                <td><?= h($padAchievement->fifth_indicator) ?></td>
                <td><?= h($padAchievement->sixth_indicator) ?></td>
                <td><?= h($padAchievement->m_e_method) ?></td>
                <td><?= h($padAchievement->critical assumptions) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $padAchievement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $padAchievement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $padAchievement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padAchievement->id)]) ?>
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

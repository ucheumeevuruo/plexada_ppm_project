<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadObjective[]|\Cake\Collection\CollectionInterface $padObjectives
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pad Objective'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padObjectives index large-9 medium-8 columns content">
    <h3><?= __('Pad Objectives') ?></h3>
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
            <?php foreach ($padObjectives as $padObjective): ?>
            <tr>
                <td><?= $this->Number->format($padObjective->id) ?></td>
                <td><?= $padObjective->has('pad') ? $this->Html->link($padObjective->pad->id, ['controller' => 'Pads', 'action' => 'view', $padObjective->pad->id]) : '' ?></td>
                <td><?= h($padObjective->specific_objective) ?></td>
                <td><?= h($padObjective->first_indicator) ?></td>
                <td><?= h($padObjective->second_indicator) ?></td>
                <td><?= h($padObjective->third_indicator) ?></td>
                <td><?= h($padObjective->forth_indicator) ?></td>
                <td><?= h($padObjective->fifth_indicator) ?></td>
                <td><?= h($padObjective->sixth_indicator) ?></td>
                <td><?= h($padObjective->m_e_method) ?></td>
                <td><?= h($padObjective->critical_assumptions) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $padObjective->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $padObjective->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $padObjective->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padObjective->id)]) ?>
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

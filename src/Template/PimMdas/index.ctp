<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimMda[]|\Cake\Collection\CollectionInterface $pimMdas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pim Mda'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimMdas index large-9 medium-8 columns content">
    <h3><?= __('Pim Mdas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mda') ?></th>
                <th scope="col"><?= $this->Paginator->sort('revision_committee_rep_information') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pimMdas as $pimMda): ?>
            <tr>
                <td><?= $this->Number->format($pimMda->id) ?></td>
                <td><?= h($pimMda->mda) ?></td>
                <td><?= h($pimMda->revision_committee_rep_information) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pimMda->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pimMda->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pimMda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimMda->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadCreditFacilityAgreement[]|\Cake\Collection\CollectionInterface $padCreditFacilityAgreements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pad Credit Facility Agreement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padCreditFacilityAgreements index large-9 medium-8 columns content">
    <h3><?= __('Pad Credit Facility Agreements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pad_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funding_agency') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conditions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($padCreditFacilityAgreements as $padCreditFacilityAgreement): ?>
            <tr>
                <td><?= $this->Number->format($padCreditFacilityAgreement->id) ?></td>
                <td><?= $padCreditFacilityAgreement->has('pad') ? $this->Html->link($padCreditFacilityAgreement->pad->id, ['controller' => 'Pads', 'action' => 'view', $padCreditFacilityAgreement->pad->id]) : '' ?></td>
                <td><?= h($padCreditFacilityAgreement->funding_agency) ?></td>
                <td><?= h($padCreditFacilityAgreement->conditions) ?></td>
                <td><?= h($padCreditFacilityAgreement->deadline) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $padCreditFacilityAgreement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $padCreditFacilityAgreement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $padCreditFacilityAgreement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padCreditFacilityAgreement->id)]) ?>
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

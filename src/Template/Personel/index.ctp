<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personel[]|\Cake\Collection\CollectionInterface $personel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Personel'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="personel index large-9 medium-8 columns content">
    <h3><?= __('Personel') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Other_names') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personel as $personel): ?>
            <tr>
                <td><?= h($personel->Last_name) ?></td>
                <td><?= h($personel->first_name) ?></td>
                <td><?= h($personel->Other_names) ?></td>
                <td><?= h($personel->role) ?></td>
                <td><?= h($personel->Address) ?></td>
                <td><?= h($personel->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $personel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $personel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $personel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personel->id)]) ?>
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

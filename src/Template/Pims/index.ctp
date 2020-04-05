<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pim[]|\Cake\Collection\CollectionInterface $pims
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Categories'), ['controller' => 'PimCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Category'), ['controller' => 'PimCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Mdas'), ['controller' => 'PimMdas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Mda'), ['controller' => 'PimMdas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Oversight Structures'), ['controller' => 'PimOversightStructures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Oversight Structure'), ['controller' => 'PimOversightStructures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Progress Reports'), ['controller' => 'PimProgressReports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Progress Report'), ['controller' => 'PimProgressReports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Project Action Plans'), ['controller' => 'PimProjectActionPlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Project Action Plan'), ['controller' => 'PimProjectActionPlans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Project Components'), ['controller' => 'PimProjectComponents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Project Component'), ['controller' => 'PimProjectComponents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Tasks'), ['controller' => 'PimTasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Task'), ['controller' => 'PimTasks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Total Expenditures'), ['controller' => 'PimTotalExpenditures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Total Expenditure'), ['controller' => 'PimTotalExpenditures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Work Plans'), ['controller' => 'PimWorkPlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Work Plan'), ['controller' => 'PimWorkPlans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pims index large-9 medium-8 columns content">
    <h3><?= __('Pims') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pim_approval_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pim_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pim_mda_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brief') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funding_agency') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pims as $pim): ?>
            <tr>
                <td><?= $this->Number->format($pim->id) ?></td>
                <td><?= $this->Number->format($pim->pim_approval_id) ?></td>
                <td><?= $pim->has('pim_category') ? $this->Html->link($pim->pim_category->id, ['controller' => 'PimCategories', 'action' => 'view', $pim->pim_category->id]) : '' ?></td>
                <td><?= $pim->has('pim_mda') ? $this->Html->link($pim->pim_mda->id, ['controller' => 'PimMdas', 'action' => 'view', $pim->pim_mda->id]) : '' ?></td>
                <td><?= h($pim->date) ?></td>
                <td><?= h($pim->brief) ?></td>
                <td><?= h($pim->funding_agency) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pim->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pim->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pim->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pim->id)]) ?>
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

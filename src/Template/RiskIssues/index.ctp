<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RiskIssue[]|\Cake\Collection\CollectionInterface $riskIssues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Risk Issue'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Staff'), ['controller' => 'Staff', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staff', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="riskIssues index large-9 medium-8 columns content">
    <h3><?= __('Risk Issues') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('record_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_to_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remediation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('issue') ?></th>
                <th scope="col"><?= $this->Paginator->sort('impact_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_resolution_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($riskIssues as $riskIssue): ?>
            <tr>
                <td><?= $this->Number->format($riskIssue->id) ?></td>
                <td><?= h($riskIssue->record_number) ?></td>
                <td><?= $riskIssue->has('project_detail') ? $this->Html->link($riskIssue->project_detail->id, ['controller' => 'ProjectDetails', 'action' => 'view', $riskIssue->project_detail->id]) : '' ?></td>
                <td><?= $riskIssue->has('staff') ? $this->Html->link($riskIssue->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $riskIssue->staff->id]) : '' ?></td>
                <td><?= $this->Number->format($riskIssue->status_id) ?></td>
                <td><?= h($riskIssue->remediation) ?></td>
                <td><?= h($riskIssue->description) ?></td>
                <td><?= h($riskIssue->issue) ?></td>
                <td><?= $riskIssue->has('lov') ? $this->Html->link($riskIssue->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $riskIssue->lov->id]) : '' ?></td>
                <td><?= h($riskIssue->expected_resolution_date) ?></td>
                <td><?= h($riskIssue->created) ?></td>
                <td><?= h($riskIssue->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $riskIssue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $riskIssue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $riskIssue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $riskIssue->id)]) ?>
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

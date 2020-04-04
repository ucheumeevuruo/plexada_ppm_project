<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RiskIssue $riskIssue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Risk Issue'), ['action' => 'edit', $riskIssue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Risk Issue'), ['action' => 'delete', $riskIssue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $riskIssue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Risk Issues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Risk Issue'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Staff'), ['controller' => 'Staff', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staff', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="riskIssues view large-9 medium-8 columns content">
    <h3><?= h($riskIssue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Record Number') ?></th>
            <td><?= h($riskIssue->record_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Detail') ?></th>
            <td><?= $riskIssue->has('project_detail') ? $this->Html->link($riskIssue->project_detail->id, ['controller' => 'ProjectDetails', 'action' => 'view', $riskIssue->project_detail->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff') ?></th>
            <td><?= $riskIssue->has('staff') ? $this->Html->link($riskIssue->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $riskIssue->staff->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remediation') ?></th>
            <td><?= h($riskIssue->remediation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($riskIssue->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Issue') ?></th>
            <td><?= h($riskIssue->issue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lov') ?></th>
            <td><?= $riskIssue->has('lov') ? $this->Html->link($riskIssue->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $riskIssue->lov->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($riskIssue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status Id') ?></th>
            <td><?= $this->Number->format($riskIssue->status_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Resolution Date') ?></th>
            <td><?= h($riskIssue->expected_resolution_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($riskIssue->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($riskIssue->modified) ?></td>
        </tr>
    </table>
</div>

<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RiskIssue $riskIssue
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<div class="riskIssues view large-9 medium-8 columns content">
    <table class="vertical-table">
        <h3><?= h($riskIssue->description) ?></h3>
        <tr>
            <th scope="row"><?= __('Record Number') ?></th>
            <td><?= h($riskIssue->record_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Detail') ?></th>
            <td><?= $riskIssue->has('project_detail') ? $this->Html->link($riskIssue->project_detail->id, ['controller' => 'ProjectDetails', 'action' => 'view', $riskIssue->project_detail->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff') ?></th>
            <td><?= $riskIssue->has('staff') ? $this->Html->link($riskIssue->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $riskIssue->staff->id]) : '' ?>
            </td>
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
            <td><?= $riskIssue->has('lov') ? $this->Html->link($riskIssue->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $riskIssue->lov->id]) : '' ?>
            </td>
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
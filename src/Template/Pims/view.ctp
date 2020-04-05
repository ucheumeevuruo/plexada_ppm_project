<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pim $pim
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim'), ['action' => 'edit', $pim->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim'), ['action' => 'delete', $pim->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pim->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pims view large-9 medium-8 columns content">
    <h3><?= h($pim->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Brief') ?></th>
            <td><?= h($pim->brief) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funding Agency') ?></th>
            <td><?= h($pim->funding_agency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activities Achievement') ?></th>
            <td><?= h($pim->activities_achievement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Risks Mitigation') ?></th>
            <td><?= h($pim->risks_mitigation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activity Next Semester') ?></th>
            <td><?= h($pim->activity_next_semester) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Oversight Level') ?></th>
            <td><?= h($pim->oversight_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Oversight Agency Mda') ?></th>
            <td><?= h($pim->oversight_agency_mda) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mda') ?></th>
            <td><?= h($pim->mda) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rev Commitee Rep Information') ?></th>
            <td><?= h($pim->rev_commitee_rep_information) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approvers Agency') ?></th>
            <td><?= h($pim->approvers_agency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approvers Rep Information') ?></th>
            <td><?= h($pim->approvers_rep_information) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parties') ?></th>
            <td><?= h($pim->parties) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsibilities') ?></th>
            <td><?= h($pim->responsibilities) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Targets') ?></th>
            <td><?= h($pim->targets) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activities') ?></th>
            <td><?= h($pim->activities) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($pim->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsible Party') ?></th>
            <td><?= h($pim->responsible_party) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dependency') ?></th>
            <td><?= h($pim->dependency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($pim->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Owner') ?></th>
            <td><?= h($pim->owner) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Currency') ?></th>
            <td><?= h($pim->currency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Task') ?></th>
            <td><?= h($pim->task) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Progress Category') ?></th>
            <td><?= h($pim->progress_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Progress Currency') ?></th>
            <td><?= h($pim->progress_currency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disbursed Current Semester') ?></th>
            <td><?= h($pim->disbursed_current_semester) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cumulated Disbursment') ?></th>
            <td><?= h($pim->cumulated_disbursment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pim->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Expenditure') ?></th>
            <td><?= $this->Number->format($pim->total_expenditure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Financial Cost') ?></th>
            <td><?= $this->Number->format($pim->financial_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disbursed Amount') ?></th>
            <td><?= $this->Number->format($pim->disbursed_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Credit Allocation') ?></th>
            <td><?= $this->Number->format($pim->amount_credit_allocation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($pim->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Approvers Date') ?></th>
            <td><?= h($pim->approvers_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($pim->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($pim->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plan Start Date') ?></th>
            <td><?= h($pim->plan_start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plan End Date') ?></th>
            <td><?= h($pim->plan_end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exp Output Date') ?></th>
            <td><?= h($pim->exp_output_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Disbursement') ?></th>
            <td><?= h($pim->date_disbursement) ?></td>
        </tr>
    </table>
</div>

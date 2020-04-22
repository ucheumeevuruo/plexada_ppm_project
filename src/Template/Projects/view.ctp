<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<div class="container-fluid">
    <h3 class="bg-primary text-light text-center"><?= h($project->name) ?></h3>
    <div class="col-md-6 float-left">
        <table class="vertical-table table-primary mt-3">
            <?= $this->Html->link(__('Add PAD'), ['controller' => 'projectDetails', 'action' => 'add'], ['class' => 'btn btn-primary btn-sm mr-3']) ?>
            <?= $this->Html->link(__('Add PIM'), ['controller' => 'pims', 'action' => 'add', $project->pims_id], ['class' => 'btn btn-primary btn-sm mr-3']) ?>
            <?= $this->Html->link(__('Add PPF'), ['controller' => 'projectFundings','action' => 'add', $project->projectFunding_id], ['class' => 'btn btn-primary btn-sm mr-3']) ?>
            <?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i> Edit'), ['action' => 'edit', $project->id], ['class' => 'btn btn-primary btn-sm mr-3', 'title' => 'Edit', 'escape' => false]) ?>
            <?= $this->Html->link(__('<i class="fa fa-trash fa-sm"></i> Delete'), ['action' => 'delete', $project->id], ['class' => 'btn btn-primary btn-sm mr-3', 'title' => 'Delete', 'escape' => false]) ?>

            <tr>
                <th scope="row" class="text-primary"><?= __('Name') ?></th>
                <td><?= h($project->name) ?></td>

            </tr>
            <tr>
                <th scope="row" class="text-primary"><?= __('Introduction') ?></th>
                <td><?= h($project->introduction) ?></td>
            </tr>
            <tr>
                <th scope="row" class="text-primary"><?= __('Location') ?></th>
                <td><?= h($project->location) ?></td>
            </tr>
            <tr>
                <th scope="row" class="text-primary"><?= __('Id') ?></th>
                <td><?= $this->Number->format($project->id) ?></td>
            </tr>
            <tr>
                <th scope="row" class="text-primary"><?= __('Cost') ?></th>
                <td><?= $this->Number->format($project->cost) ?></td>
            </tr>
        </table>
    </div>

    <div class="col-md-6 float-left">
        <h4 class="text-primary text-center"><?= __('Objectives') ?></h4>
        <div class="">
            <div class="table-responsive">
                <table class="table table-borered table-primary br-m" cellpadding="0" cellspacing="0">
                    <tr class="bg-primary">
                        <!-- <th scope="col"><?= __('Id') ?></th> -->
                        <!-- <th scope="col"><?= __('Project Id') ?></th> -->
                        <th scope="col"><?= __('Objective') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($project->objectives as $objectives): ?>
                    <tr>
                        <!-- <td><?= h($objectives->id) ?></td> -->
                        <!-- <td><?= h($objectives->project_id) ?></td> -->
                        <td><?= h($objectives->objective) ?></td>
                        <td class="actions" width="15%">
                            <!-- <?= $this->Html->link(__('View'), ['controller' => 'Objectives', 'action' => 'view', $objectives->id]) ?> -->
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Objectives', 'action' => 'edit', $objectives->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Objectives', 'action' => 'delete', $objectives->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objectives->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <hr>

    <div class="related">
        <h4 class="text-primary text-center"><?= __('Project Details') ?></h4>
        <?php if (!empty($project->project_details)): ?>
        <table class="table table-bordered dataTable table-primary br-m" cellpadding="0" cellspacing="0">
            <tr class="bg-primary text-light">
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Vendor Id') ?></th>
                <th scope="col"><?= __('Manager Id') ?></th>
                <th scope="col"><?= __('Sponsor Id') ?></th>
                <th scope="col"><?= __('Waiting Since') ?></th>
                <th scope="col"><?= __('Waiting On Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Priority Id') ?></th>
                <th scope="col"><?= __('Start Dt') ?></th>
                <th scope="col"><?= __('End Dt') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Last Updated') ?></th>
                <th scope="col"><?= __('System User Id') ?></th>
                <th scope="col"><?= __('Annotation Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Environmental Factors') ?></th>
                <th scope="col"><?= __('Partners') ?></th>
                <th scope="col"><?= __('Funding') ?></th>
                <th scope="col"><?= __('Approvals') ?></th>
                <th scope="col"><?= __('Risks') ?></th>
                <th scope="col"><?= __('Components') ?></th>
                <th scope="col"><?= __('Price Id') ?></th>
                <th scope="col"><?= __('Sub Status Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->project_details as $projectDetails): ?>
            <tr>
                <td><?= h($projectDetails->id) ?></td>
                <td><?= h($projectDetails->name) ?></td>
                <td><?= h($projectDetails->description) ?></td>
                <td><?= h($projectDetails->location) ?></td>
                <td><?= h($projectDetails->vendor_id) ?></td>
                <td><?= h($projectDetails->manager_id) ?></td>
                <td><?= h($projectDetails->sponsor_id) ?></td>
                <td><?= h($projectDetails->waiting_since) ?></td>
                <td><?= h($projectDetails->waiting_on_id) ?></td>
                <td><?= h($projectDetails->status_id) ?></td>
                <td><?= h($projectDetails->priority_id) ?></td>
                <td><?= h($projectDetails->start_dt) ?></td>
                <td><?= h($projectDetails->end_dt) ?></td>
                <td><?= h($projectDetails->created) ?></td>
                <td><?= h($projectDetails->last_updated) ?></td>
                <td><?= h($projectDetails->system_user_id) ?></td>
                <td><?= h($projectDetails->annotation_id) ?></td>
                <td><?= h($projectDetails->project_id) ?></td>
                <td><?= h($projectDetails->environmental_factors) ?></td>
                <td><?= h($projectDetails->partners) ?></td>
                <td><?= h($projectDetails->funding) ?></td>
                <td><?= h($projectDetails->approvals) ?></td>
                <td><?= h($projectDetails->risks) ?></td>
                <td><?= h($projectDetails->components) ?></td>
                <td><?= h($projectDetails->price_id) ?></td>
                <td><?= h($projectDetails->sub_status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjectDetails', 'action' => 'view', $projectDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectDetails', 'action' => 'edit', $projectDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectDetails', 'action' => 'delete', $projectDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <hr>

    <div class="related">
        <h4 class="text-primary text-center"><?= __('Project Funding') ?></h4>
        <?php if (!empty($project->project_details)): ?>
        <table class="table table-bordered dataTable table-primary br-m" cellpadding="0" cellspacing="0">
            <tr class="bg-primary text-light">
                <!-- <th scope="col"><?= __('Id') ?></th> -->
                <!-- <th scope="col"><?= __('Project') ?></th> -->
                <th scope="col"><?= __('Milestone') ?></th>
                <th scope="col"><?= __('Funding') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->project_fundings as $projectFunding): ?>
            <tr>
            <!-- <td><?= $this->Number->format($projectFunding->id) ?></td> -->
                <td><?= $projectFunding->has('milestone') ? $this->Html->link($projectFunding->milestone->id, ['controller' => 'Milestones', 'action' => 'view', $projectFunding->milestone->id]) : '' ?></td>
                <td><?= $this->Number->format($projectFunding->project_id) ?></td>
                <td><?= $this->Number->format($projectFunding->funding) ?></td>
                <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $projectFunding->id]) ?> -->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectFunding->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectFunding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectFunding->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <hr>

    <div class="related">
        <h4 class="text-primary text-center"><?= __('Project Implementation') ?></h4>
        <?php if (!empty($project->pims)): ?>
        <table class="table table-bordered dataTable table-primary br-m" cellpadding="0" cellspacing="0">
            <tr class="bg-primary text-light">
                <th scope="col"><?= __('Brief') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Funding Agency') ?></th>
                <th scope="col"><?= __('Total Expenditure') ?></th>
                <th scope="col"><?= __('Oversight Agency') ?></th>
                <th scope="col"><?= __('Oversight Level') ?></th>
                <th scope="col"><?= __('Approval Agency') ?></th>
                <th scope="col"><?= __('Approval information') ?></th>
                <th scope="col"><?= __('Approval date') ?></th>
                <th scope="col"><?= __('Signed MOU') ?></th>
                <th scope="col"><?= __('Adopted minute') ?></th>
                <th scope="col"><?= __('Financial management') ?></th>
                <th scope="col"><?= __('Financial Templates') ?></th>
                <th scope="col"><?= __('Financial cost') ?></th>
                <th scope="col"><?= __('Target') ?></th>
                <th scope="col"><?= __('Responsible party') ?></th>
                <th scope="col"><?= __('Plan start date') ?></th>
                <th scope="col"><?= __('Plan end date') ?></th>
                <th scope="col"><?= __('Dependency') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Owner') ?></th>
                <th scope="col"><?= __('Currency') ?></th>
                <th scope="col"><?= __('Disbursed Amount') ?></th>
                <th scope="col"><?= __('Expected output date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->project_details as $projectDetails): ?>
            <tr>
                <td><?= $this->Html->link(__(h($pim->brief)), ['action' => 'view', $pim->id]) ?></td>
                <td><?= h($pim->date->format('d-M-Y')) ?></td>
                <td><?= h($pim->funding_agency) ?></td>
                <td><?= $this->Number->format($pim->total_expenditure) ?></td>
                <td><?= h($pim->oversight_agency_mda) ?></td>
                <td><?= h($pim->oversight_level) ?></td>
                <td><?= h($pim->approvers_agency) ?></td>
                <td><?= h($pim->approvers_rep_information) ?></td>
                <td><?= h($pim->approvers_date->format('d-M-Y')) ?></td> -->
                <td><?= h($pim->signed_mou) ?></td>
                <td><?= h($pim->adopted_minutes) ?></td>
                <td><?= h($pim->financial_management) ?></td>
                <td><?= h($pim->financial_template) ?></td>


                <td><?= h($projectDetails->name) ?></td>
                <td><?= h($projectDetails->description) ?></td>
                <td><?= h($projectDetails->location) ?></td>
                <td><?= h($projectDetails->vendor_id) ?></td>
                <td><?= h($projectDetails->manager_id) ?></td>
                <td><?= h($projectDetails->sponsor_id) ?></td>
                <td><?= h($projectDetails->waiting_since) ?></td>
                <td><?= h($projectDetails->waiting_on_id) ?></td>
                <td><?= h($projectDetails->status_id) ?></td>
                <td><?= h($projectDetails->priority_id) ?></td>
                <td><?= h($projectDetails->start_dt) ?></td>
                <td><?= h($projectDetails->end_dt) ?></td>
                <td><?= h($projectDetails->created) ?></td>
                <td><?= h($projectDetails->last_updated) ?></td>
                <td><?= h($projectDetails->system_user_id) ?></td>
                <td><?= h($projectDetails->annotation_id) ?></td>
                <td><?= h($projectDetails->project_id) ?></td>
                <td><?= h($projectDetails->environmental_factors) ?></td>
                <td><?= h($projectDetails->partners) ?></td>
                <td><?= h($projectDetails->funding) ?></td>
                <td><?= h($projectDetails->approvals) ?></td>
                <td><?= h($projectDetails->risks) ?></td>
                <td><?= h($projectDetails->components) ?></td>
                <td><?= h($projectDetails->price_id) ?></td>
                <td><?= h($projectDetails->sub_status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjectDetails', 'action' => 'view', $projectDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectDetails', 'action' => 'edit', $projectDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectDetails', 'action' => 'delete', $projectDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <hr>

    <div class="related">
        <h4 class="text-primary text-center"><?= __('Milestones') ?></h4>
        <?php if (!empty($project->milestones)): ?>
        <table class="table table-bordered table-primary br-m" cellpadding="0" cellspacing="0">
            <tr class="bg-primary br-t">
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Record Number') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Payment') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Achievement') ?></th>
                <!-- <th scope="col"><?= __('Trigger Id') ?></th> -->
                <th scope="col"><?= __('Completed Date') ?></th>
                <th scope="col"><?= __('Expected Completion Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->milestones as $milestones): ?>
            <tr>
                <td><?= h($milestones->id) ?></td>
                <td><?= h($milestones->record_number) ?></td>
                <td><?= h($milestones->project_id) ?></td>
                <td><?= h($milestones->amount) ?></td>
                <td><?= h($milestones->payment) ?></td>
                <td><?= h($milestones->status_id) ?></td>
                <td><?= h($milestones->description) ?></td>
                <td><?= h($milestones->achievement) ?></td>
                <td><?= h($milestones->trigger_id) ?></td>
                <td><?= h($milestones->completed_date) ?></td>
                <td><?= h($milestones->expected_completion_date) ?></td>
                <td><?= h($milestones->created) ?></td>
                <td><?= h($milestones->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Milestones', 'action' => 'view', $milestones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Milestones', 'action' => 'edit', $milestones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Milestones', 'action' => 'delete', $milestones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milestones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <hr>

    <div class="related">
        <h4 class="text-primary text-center"><?= __('Activities') ?></h4>
        <?php if (!empty($project->activities)): ?>
        <table class="table table-bordered dataTable table-primary br-m" cellpadding="0" cellspacing="0">
            <tr class="bg-primary text-light">
                <th scope="col"><?= __('Activity Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Current Activity') ?></th>
                <th scope="col"><?= __('Waiting On') ?></th>
                <th scope="col"><?= __('Waiting Since') ?></th>
                <th scope="col"><?= __('Next Activity') ?></th>
                <th scope="col"><?= __('Assigned To Id') ?></th>
                <th scope="col"><?= __('Percentage Completion') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Priority Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Last Updated') ?></th>
                <th scope="col"><?= __('System User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->activities as $activities): ?>
            <tr>
                <td><?= h($activities->activity_id) ?></td>
                <td><?= h($activities->project_id) ?></td>
                <td><?= h($activities->current_activity) ?></td>
                <td><?= h($activities->waiting_on) ?></td>
                <td><?= h($activities->waiting_since) ?></td>
                <td><?= h($activities->next_activity) ?></td>
                <td><?= h($activities->assigned_to_id) ?></td>
                <td><?= h($activities->percentage_completion) ?></td>
                <td><?= h($activities->description) ?></td>
                <td><?= h($activities->status_id) ?></td>
                <td><?= h($activities->priority_id) ?></td>
                <td><?= h($activities->created) ?></td>
                <td><?= h($activities->last_updated) ?></td>
                <td><?= h($activities->system_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->activity_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->activity_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->activity_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->activity_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <hr>

    <!-- <div class="related">
        <h4 class="text-primary"><?= __('Related Prices') ?></h4>
        <?php if (!empty($project->prices)): ?>
        <table class="table table-bordered dataTable table-primary br-m" cellpadding="0" cellspacing="0">
            <tr class="bg-primary">
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Budget') ?></th>
                <th scope="col"><?= __('Total Cost') ?></th>
                <th scope="col"><?= __('Amount Paid') ?></th>
                <th scope="col"><?= __('Date Of Payment') ?></th>
                <th scope="col"><?= __('Payment Type') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Last Updated') ?></th>
                <th scope="col"><?= __('System User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->prices as $prices): ?>
            <tr>
                <td><?= h($prices->id) ?></td>
                <td><?= h($prices->project_id) ?></td>
                <td><?= h($prices->budget) ?></td>
                <td><?= h($prices->total_cost) ?></td>
                <td><?= h($prices->amount_paid) ?></td>
                <td><?= h($prices->date_of_payment) ?></td>
                <td><?= h($prices->payment_type) ?></td>
                <td><?= h($prices->created) ?></td>
                <td><?= h($prices->last_updated) ?></td>
                <td><?= h($prices->system_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Prices', 'action' => 'view', $prices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Prices', 'action' => 'edit', $prices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prices', 'action' => 'delete', $prices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <hr> -->

    <div class="related">
        <h4 class="text-primary text-center"><?= __('Risks') ?></h4>
        <?php if (!empty($project->risk_issues)): ?>
        <table class="table table-bordered dataTable table-primary br-m" cellpadding="0" cellspacing="0">
            <tr class="bg-primary">
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Record Number') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Assigned To Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Remediation') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Issue') ?></th>
                <th scope="col"><?= __('Impact Id') ?></th>
                <th scope="col"><?= __('Expected Resolution Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->risk_issues as $riskIssues): ?>
            <tr>
                <td><?= h($riskIssues->id) ?></td>
                <td><?= h($riskIssues->record_number) ?></td>
                <td><?= h($riskIssues->project_id) ?></td>
                <td><?= h($riskIssues->assigned_to_id) ?></td>
                <td><?= h($riskIssues->status_id) ?></td>
                <td><?= h($riskIssues->Remediation) ?></td>
                <td><?= h($riskIssues->description) ?></td>
                <td><?= h($riskIssues->issue) ?></td>
                <td><?= h($riskIssues->impact_id) ?></td>
                <td><?= h($riskIssues->expected_resolution_date) ?></td>
                <td><?= h($riskIssues->created) ?></td>
                <td><?= h($riskIssues->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RiskIssues', 'action' => 'view', $riskIssues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RiskIssues', 'action' => 'edit', $riskIssues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RiskIssues', 'action' => 'delete', $riskIssues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $riskIssues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <hr>

    <script>
 $('.dataTable').DataTable();
 </script>
</div>

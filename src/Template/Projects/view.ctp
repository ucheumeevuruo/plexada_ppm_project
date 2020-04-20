<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Fundings'), ['controller' => 'ProjectFundings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Funding'), ['controller' => 'ProjectFundings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Annotations'), ['controller' => 'Annotations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Annotation'), ['controller' => 'Annotations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Milestones'), ['controller' => 'Milestones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Milestone'), ['controller' => 'Milestones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Objectives'), ['controller' => 'Objectives', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Objective'), ['controller' => 'Objectives', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Milestones'), ['controller' => 'ProjectMilestones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Milestone'), ['controller' => 'ProjectMilestones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Objectives'), ['controller' => 'ProjectObjectives', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Objective'), ['controller' => 'ProjectObjectives', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Risk Issues'), ['controller' => 'RiskIssues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Risk Issue'), ['controller' => 'RiskIssues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($project->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Introduction') ?></th>
            <td><?= h($project->introduction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($project->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pim') ?></th>
            <td><?= $project->has('pim') ? $this->Html->link($project->pim->id, ['controller' => 'Pims', 'action' => 'view', $project->pim->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Funding') ?></th>
            <td><?= $project->has('project_funding') ? $this->Html->link($project->project_funding->id, ['controller' => 'ProjectFundings', 'action' => 'view', $project->project_funding->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($project->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Detail Id') ?></th>
            <td><?= $this->Number->format($project->project_detail_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Project Details') ?></h4>
        <?php if (!empty($project->project_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
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
    <div class="related">
        <h4><?= __('Related Activities') ?></h4>
        <?php if (!empty($project->activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
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
    <div class="related">
        <h4><?= __('Related Annotations') ?></h4>
        <?php if (!empty($project->annotations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->annotations as $annotations): ?>
            <tr>
                <td><?= h($annotations->id) ?></td>
                <td><?= h($annotations->project_id) ?></td>
                <td><?= h($annotations->comment) ?></td>
                <td><?= h($annotations->created) ?></td>
                <td><?= h($annotations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Annotations', 'action' => 'view', $annotations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Annotations', 'action' => 'edit', $annotations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Annotations', 'action' => 'delete', $annotations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $annotations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Milestones') ?></h4>
        <?php if (!empty($project->milestones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Record Number') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Payment') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Achievement') ?></th>
                <th scope="col"><?= __('Trigger Id') ?></th>
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
    <div class="related">
        <h4><?= __('Related Objectives') ?></h4>
        <?php if (!empty($project->objectives)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Objective') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->objectives as $objectives): ?>
            <tr>
                <td><?= h($objectives->id) ?></td>
                <td><?= h($objectives->project_id) ?></td>
                <td><?= h($objectives->objective) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Objectives', 'action' => 'view', $objectives->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Objectives', 'action' => 'edit', $objectives->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Objectives', 'action' => 'delete', $objectives->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objectives->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Prices') ?></h4>
        <?php if (!empty($project->prices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
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
    <div class="related">
        <h4><?= __('Related Project Milestones') ?></h4>
        <?php if (!empty($project->project_milestones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->project_milestones as $projectMilestones): ?>
            <tr>
                <td><?= h($projectMilestones->id) ?></td>
                <td><?= h($projectMilestones->project_id) ?></td>
                <td><?= h($projectMilestones->status) ?></td>
                <td><?= h($projectMilestones->description) ?></td>
                <td><?= h($projectMilestones->created_at) ?></td>
                <td><?= h($projectMilestones->duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjectMilestones', 'action' => 'view', $projectMilestones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectMilestones', 'action' => 'edit', $projectMilestones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectMilestones', 'action' => 'delete', $projectMilestones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectMilestones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Project Objectives') ?></h4>
        <?php if (!empty($project->project_objectives)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Priority') ?></th>
                <th scope="col"><?= __('Impact') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Last Updated') ?></th>
                <th scope="col"><?= __('System User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->project_objectives as $projectObjectives): ?>
            <tr>
                <td><?= h($projectObjectives->id) ?></td>
                <td><?= h($projectObjectives->project_id) ?></td>
                <td><?= h($projectObjectives->priority) ?></td>
                <td><?= h($projectObjectives->impact) ?></td>
                <td><?= h($projectObjectives->created) ?></td>
                <td><?= h($projectObjectives->last_updated) ?></td>
                <td><?= h($projectObjectives->system_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjectObjectives', 'action' => 'view', $projectObjectives->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectObjectives', 'action' => 'edit', $projectObjectives->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectObjectives', 'action' => 'delete', $projectObjectives->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectObjectives->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Risk Issues') ?></h4>
        <?php if (!empty($project->risk_issues)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
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
</div>

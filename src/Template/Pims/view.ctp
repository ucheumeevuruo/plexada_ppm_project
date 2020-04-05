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
        <li><?= $this->Html->link(__('List Pim Categories'), ['controller' => 'PimCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Category'), ['controller' => 'PimCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pim Mdas'), ['controller' => 'PimMdas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Mda'), ['controller' => 'PimMdas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pim Oversight Structures'), ['controller' => 'PimOversightStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Oversight Structure'), ['controller' => 'PimOversightStructures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pim Progress Reports'), ['controller' => 'PimProgressReports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Progress Report'), ['controller' => 'PimProgressReports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pim Project Action Plans'), ['controller' => 'PimProjectActionPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Project Action Plan'), ['controller' => 'PimProjectActionPlans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pim Project Components'), ['controller' => 'PimProjectComponents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Project Component'), ['controller' => 'PimProjectComponents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pim Tasks'), ['controller' => 'PimTasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Task'), ['controller' => 'PimTasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pim Total Expenditures'), ['controller' => 'PimTotalExpenditures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Total Expenditure'), ['controller' => 'PimTotalExpenditures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pim Work Plans'), ['controller' => 'PimWorkPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Work Plan'), ['controller' => 'PimWorkPlans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pims view large-9 medium-8 columns content">
    <h3><?= h($pim->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pim Category') ?></th>
            <td><?= $pim->has('pim_category') ? $this->Html->link($pim->pim_category->id, ['controller' => 'PimCategories', 'action' => 'view', $pim->pim_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pim Mda') ?></th>
            <td><?= $pim->has('pim_mda') ? $this->Html->link($pim->pim_mda->id, ['controller' => 'PimMdas', 'action' => 'view', $pim->pim_mda->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brief') ?></th>
            <td><?= h($pim->brief) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funding Agency') ?></th>
            <td><?= h($pim->funding_agency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pim->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pim Approval Id') ?></th>
            <td><?= $this->Number->format($pim->pim_approval_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($pim->date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pim Oversight Structures') ?></h4>
        <?php if (!empty($pim->pim_oversight_structures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pim Id') ?></th>
                <th scope="col"><?= __('Oversight Level') ?></th>
                <th scope="col"><?= __('Oversight Agency Mda') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pim->pim_oversight_structures as $pimOversightStructures): ?>
            <tr>
                <td><?= h($pimOversightStructures->id) ?></td>
                <td><?= h($pimOversightStructures->pim_id) ?></td>
                <td><?= h($pimOversightStructures->oversight_level) ?></td>
                <td><?= h($pimOversightStructures->oversight_agency_mda) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PimOversightStructures', 'action' => 'view', $pimOversightStructures->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PimOversightStructures', 'action' => 'edit', $pimOversightStructures->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PimOversightStructures', 'action' => 'delete', $pimOversightStructures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimOversightStructures->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pim Progress Reports') ?></h4>
        <?php if (!empty($pim->pim_progress_reports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pim Id') ?></th>
                <th scope="col"><?= __('Progress Category') ?></th>
                <th scope="col"><?= __('Progress Currency') ?></th>
                <th scope="col"><?= __('Amount Credit Allocation') ?></th>
                <th scope="col"><?= __('Disbursed Current Semester') ?></th>
                <th scope="col"><?= __('Date Disbursed') ?></th>
                <th scope="col"><?= __('Cumulated Disbursement') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pim->pim_progress_reports as $pimProgressReports): ?>
            <tr>
                <td><?= h($pimProgressReports->id) ?></td>
                <td><?= h($pimProgressReports->pim_id) ?></td>
                <td><?= h($pimProgressReports->progress_category) ?></td>
                <td><?= h($pimProgressReports->progress_currency) ?></td>
                <td><?= h($pimProgressReports->amount_credit_allocation) ?></td>
                <td><?= h($pimProgressReports->disbursed_current_semester) ?></td>
                <td><?= h($pimProgressReports->date_disbursed) ?></td>
                <td><?= h($pimProgressReports->cumulated_disbursement) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PimProgressReports', 'action' => 'view', $pimProgressReports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PimProgressReports', 'action' => 'edit', $pimProgressReports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PimProgressReports', 'action' => 'delete', $pimProgressReports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimProgressReports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pim Project Action Plans') ?></h4>
        <?php if (!empty($pim->pim_project_action_plans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pim Id') ?></th>
                <th scope="col"><?= __('Activities') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Responsible Party') ?></th>
                <th scope="col"><?= __('Plan Start Date') ?></th>
                <th scope="col"><?= __('Plan End Date') ?></th>
                <th scope="col"><?= __('Dependency') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pim->pim_project_action_plans as $pimProjectActionPlans): ?>
            <tr>
                <td><?= h($pimProjectActionPlans->id) ?></td>
                <td><?= h($pimProjectActionPlans->pim_id) ?></td>
                <td><?= h($pimProjectActionPlans->activities) ?></td>
                <td><?= h($pimProjectActionPlans->action) ?></td>
                <td><?= h($pimProjectActionPlans->responsible_party) ?></td>
                <td><?= h($pimProjectActionPlans->plan_start_date) ?></td>
                <td><?= h($pimProjectActionPlans->plan_end_date) ?></td>
                <td><?= h($pimProjectActionPlans->dependency) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PimProjectActionPlans', 'action' => 'view', $pimProjectActionPlans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PimProjectActionPlans', 'action' => 'edit', $pimProjectActionPlans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PimProjectActionPlans', 'action' => 'delete', $pimProjectActionPlans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimProjectActionPlans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pim Project Components') ?></h4>
        <?php if (!empty($pim->pim_project_components)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pim Id') ?></th>
                <th scope="col"><?= __('Activities Achievements') ?></th>
                <th scope="col"><?= __('Risks Mitigations') ?></th>
                <th scope="col"><?= __('Activity Next Semester') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pim->pim_project_components as $pimProjectComponents): ?>
            <tr>
                <td><?= h($pimProjectComponents->id) ?></td>
                <td><?= h($pimProjectComponents->pim_id) ?></td>
                <td><?= h($pimProjectComponents->activities_achievements) ?></td>
                <td><?= h($pimProjectComponents->risks_mitigations) ?></td>
                <td><?= h($pimProjectComponents->activity_next_semester) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PimProjectComponents', 'action' => 'view', $pimProjectComponents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PimProjectComponents', 'action' => 'edit', $pimProjectComponents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PimProjectComponents', 'action' => 'delete', $pimProjectComponents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimProjectComponents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pim Tasks') ?></h4>
        <?php if (!empty($pim->pim_tasks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Task') ?></th>
                <th scope="col"><?= __('Pim Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pim->pim_tasks as $pimTasks): ?>
            <tr>
                <td><?= h($pimTasks->id) ?></td>
                <td><?= h($pimTasks->task) ?></td>
                <td><?= h($pimTasks->pim_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PimTasks', 'action' => 'view', $pimTasks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PimTasks', 'action' => 'edit', $pimTasks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PimTasks', 'action' => 'delete', $pimTasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimTasks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pim Total Expenditures') ?></h4>
        <?php if (!empty($pim->pim_total_expenditures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pim Id') ?></th>
                <th scope="col"><?= __('Total Expenditure') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pim->pim_total_expenditures as $pimTotalExpenditures): ?>
            <tr>
                <td><?= h($pimTotalExpenditures->id) ?></td>
                <td><?= h($pimTotalExpenditures->pim_id) ?></td>
                <td><?= h($pimTotalExpenditures->total_expenditure) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PimTotalExpenditures', 'action' => 'view', $pimTotalExpenditures->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PimTotalExpenditures', 'action' => 'edit', $pimTotalExpenditures->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PimTotalExpenditures', 'action' => 'delete', $pimTotalExpenditures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimTotalExpenditures->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pim Work Plans') ?></h4>
        <?php if (!empty($pim->pim_work_plans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pim Id') ?></th>
                <th scope="col"><?= __('Parties') ?></th>
                <th scope="col"><?= __('Responsibilities') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Financial Cost') ?></th>
                <th scope="col"><?= __('Targets') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pim->pim_work_plans as $pimWorkPlans): ?>
            <tr>
                <td><?= h($pimWorkPlans->id) ?></td>
                <td><?= h($pimWorkPlans->pim_id) ?></td>
                <td><?= h($pimWorkPlans->parties) ?></td>
                <td><?= h($pimWorkPlans->responsibilities) ?></td>
                <td><?= h($pimWorkPlans->start_date) ?></td>
                <td><?= h($pimWorkPlans->end_date) ?></td>
                <td><?= h($pimWorkPlans->financial_cost) ?></td>
                <td><?= h($pimWorkPlans->targets) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PimWorkPlans', 'action' => 'view', $pimWorkPlans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PimWorkPlans', 'action' => 'edit', $pimWorkPlans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PimWorkPlans', 'action' => 'delete', $pimWorkPlans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimWorkPlans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

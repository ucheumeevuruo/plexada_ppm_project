<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pad $pad
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pad'), ['action' => 'edit', $pad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pad'), ['action' => 'delete', $pad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pad Achievements'), ['controller' => 'PadAchievements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Achievement'), ['controller' => 'PadAchievements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pad Activities Means'), ['controller' => 'PadActivitiesMeans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Activities Mean'), ['controller' => 'PadActivitiesMeans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pad Costings'), ['controller' => 'PadCostings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Costing'), ['controller' => 'PadCostings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pad Credit Facility Agreements'), ['controller' => 'PadCreditFacilityAgreements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Credit Facility Agreement'), ['controller' => 'PadCreditFacilityAgreements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pad Objectives'), ['controller' => 'PadObjectives', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Objective'), ['controller' => 'PadObjectives', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pads view large-9 medium-8 columns content">
    <h3><?= h($pad->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Brief') ?></th>
            <td><?= h($pad->brief) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Key Players') ?></th>
            <td><?= h($pad->key_players) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Type') ?></th>
            <td><?= h($pad->project_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Target') ?></th>
            <td><?= h($pad->project_target) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($pad->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pad->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($pad->date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pad Achievements') ?></h4>
        <?php if (!empty($pad->pad_achievements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pad Id') ?></th>
                <th scope="col"><?= __('Specific Objective') ?></th>
                <th scope="col"><?= __('First Indicator') ?></th>
                <th scope="col"><?= __('Second Indicator') ?></th>
                <th scope="col"><?= __('Third Indicator') ?></th>
                <th scope="col"><?= __('Forth Indicator') ?></th>
                <th scope="col"><?= __('Fifth Indicator') ?></th>
                <th scope="col"><?= __('Sixth Indicator') ?></th>
                <th scope="col"><?= __('M E Method') ?></th>
                <th scope="col"><?= __('Critical Assumptions') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pad->pad_achievements as $padAchievements): ?>
            <tr>
                <td><?= h($padAchievements->id) ?></td>
                <td><?= h($padAchievements->pad_id) ?></td>
                <td><?= h($padAchievements->specific_objective) ?></td>
                <td><?= h($padAchievements->first_indicator) ?></td>
                <td><?= h($padAchievements->second_indicator) ?></td>
                <td><?= h($padAchievements->third_indicator) ?></td>
                <td><?= h($padAchievements->forth_indicator) ?></td>
                <td><?= h($padAchievements->fifth_indicator) ?></td>
                <td><?= h($padAchievements->sixth_indicator) ?></td>
                <td><?= h($padAchievements->m_e_method) ?></td>
                <td><?= h($padAchievements->critical assumptions) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PadAchievements', 'action' => 'view', $padAchievements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PadAchievements', 'action' => 'edit', $padAchievements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PadAchievements', 'action' => 'delete', $padAchievements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padAchievements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pad Activities Means') ?></h4>
        <?php if (!empty($pad->pad_activities_means)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pad Id') ?></th>
                <th scope="col"><?= __('Specific Objective') ?></th>
                <th scope="col"><?= __('First Indicator') ?></th>
                <th scope="col"><?= __('Second Indicator') ?></th>
                <th scope="col"><?= __('Third Indicator') ?></th>
                <th scope="col"><?= __('Forth Indicator') ?></th>
                <th scope="col"><?= __('Fifth Indicator') ?></th>
                <th scope="col"><?= __('Sixth Indicator') ?></th>
                <th scope="col"><?= __('M E Method') ?></th>
                <th scope="col"><?= __('Critical Assumptions') ?></th>
                <th scope="col"><?= __('Pad File') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pad->pad_activities_means as $padActivitiesMeans): ?>
            <tr>
                <td><?= h($padActivitiesMeans->id) ?></td>
                <td><?= h($padActivitiesMeans->pad_id) ?></td>
                <td><?= h($padActivitiesMeans->specific_objective) ?></td>
                <td><?= h($padActivitiesMeans->first_indicator) ?></td>
                <td><?= h($padActivitiesMeans->second_indicator) ?></td>
                <td><?= h($padActivitiesMeans->third_indicator) ?></td>
                <td><?= h($padActivitiesMeans->forth_indicator) ?></td>
                <td><?= h($padActivitiesMeans->fifth_indicator) ?></td>
                <td><?= h($padActivitiesMeans->sixth_indicator) ?></td>
                <td><?= h($padActivitiesMeans->m_e_method) ?></td>
                <td><?= h($padActivitiesMeans->critical_assumptions) ?></td>
                <td><?= h($padActivitiesMeans->pad_file) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PadActivitiesMeans', 'action' => 'view', $padActivitiesMeans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PadActivitiesMeans', 'action' => 'edit', $padActivitiesMeans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PadActivitiesMeans', 'action' => 'delete', $padActivitiesMeans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padActivitiesMeans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pad Costings') ?></h4>
        <?php if (!empty($pad->pad_costings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pad Id') ?></th>
                <th scope="col"><?= __('Project Amount') ?></th>
                <th scope="col"><?= __('Currency') ?></th>
                <th scope="col"><?= __('Due Date') ?></th>
                <th scope="col"><?= __('Expected Outcome') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pad->pad_costings as $padCostings): ?>
            <tr>
                <td><?= h($padCostings->id) ?></td>
                <td><?= h($padCostings->pad_id) ?></td>
                <td><?= h($padCostings->project_amount) ?></td>
                <td><?= h($padCostings->currency) ?></td>
                <td><?= h($padCostings->due_date) ?></td>
                <td><?= h($padCostings->expected_outcome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PadCostings', 'action' => 'view', $padCostings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PadCostings', 'action' => 'edit', $padCostings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PadCostings', 'action' => 'delete', $padCostings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padCostings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pad Credit Facility Agreements') ?></h4>
        <?php if (!empty($pad->pad_credit_facility_agreements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pad Id') ?></th>
                <th scope="col"><?= __('Funding Agency') ?></th>
                <th scope="col"><?= __('Conditions') ?></th>
                <th scope="col"><?= __('Deadline') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pad->pad_credit_facility_agreements as $padCreditFacilityAgreements): ?>
            <tr>
                <td><?= h($padCreditFacilityAgreements->id) ?></td>
                <td><?= h($padCreditFacilityAgreements->pad_id) ?></td>
                <td><?= h($padCreditFacilityAgreements->funding_agency) ?></td>
                <td><?= h($padCreditFacilityAgreements->conditions) ?></td>
                <td><?= h($padCreditFacilityAgreements->deadline) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PadCreditFacilityAgreements', 'action' => 'view', $padCreditFacilityAgreements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PadCreditFacilityAgreements', 'action' => 'edit', $padCreditFacilityAgreements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PadCreditFacilityAgreements', 'action' => 'delete', $padCreditFacilityAgreements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padCreditFacilityAgreements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pad Objectives') ?></h4>
        <?php if (!empty($pad->pad_objectives)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pad Id') ?></th>
                <th scope="col"><?= __('Specific Objective') ?></th>
                <th scope="col"><?= __('First Indicator') ?></th>
                <th scope="col"><?= __('Second Indicator') ?></th>
                <th scope="col"><?= __('Third Indicator') ?></th>
                <th scope="col"><?= __('Forth Indicator') ?></th>
                <th scope="col"><?= __('Fifth Indicator') ?></th>
                <th scope="col"><?= __('Sixth Indicator') ?></th>
                <th scope="col"><?= __('M E Method') ?></th>
                <th scope="col"><?= __('Critical Assumptions') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pad->pad_objectives as $padObjectives): ?>
            <tr>
                <td><?= h($padObjectives->id) ?></td>
                <td><?= h($padObjectives->pad_id) ?></td>
                <td><?= h($padObjectives->specific_objective) ?></td>
                <td><?= h($padObjectives->first_indicator) ?></td>
                <td><?= h($padObjectives->second_indicator) ?></td>
                <td><?= h($padObjectives->third_indicator) ?></td>
                <td><?= h($padObjectives->forth_indicator) ?></td>
                <td><?= h($padObjectives->fifth_indicator) ?></td>
                <td><?= h($padObjectives->sixth_indicator) ?></td>
                <td><?= h($padObjectives->m_e_method) ?></td>
                <td><?= h($padObjectives->critical_assumptions) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PadObjectives', 'action' => 'view', $padObjectives->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PadObjectives', 'action' => 'edit', $padObjectives->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PadObjectives', 'action' => 'delete', $padObjectives->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padObjectives->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

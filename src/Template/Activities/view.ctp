<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>



<div class="activities view large-9 medium-8 columns content">
    <h3><?= h($activity->description) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project Detail') ?></th>
            <td><?= $activity->has('project_detail') ? $this->Html->link($activity->project_detail->id, ['controller' => 'ProjectDetailsOld', 'action' => 'view', $activity->project_detail->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Activity') ?></th>
            <td><?= h($activity->current_activity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waiting On') ?></th>
            <td><?= h($activity->waiting_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Next Activity') ?></th>
            <td><?= h($activity->next_activity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff') ?></th>
            <td><?= $activity->has('staff') ? $this->Html->link($activity->staff->id, ['controller' => 'Staff', 'action' => 'view', $activity->staff->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($activity->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lov') ?></th>
            <td><?= $activity->has('lov') ? $this->Html->link($activity->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $activity->lov->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $activity->has('user') ? $this->Html->link($activity->user->id, ['controller' => 'Users', 'action' => 'view', $activity->user->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activity Id') ?></th>
            <td><?= $this->Number->format($activity->activity_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Percentage Completion') ?></th>
            <td><?= $this->Number->format($activity->percentage_completion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waiting Since') ?></th>
            <td><?= h($activity->waiting_since) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($activity->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Updated') ?></th>
            <td><?= h($activity->last_updated) ?></td>
        </tr>
    </table>
</div>
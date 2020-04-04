<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->activity_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->activity_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->activity_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetailsOld', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetailsOld', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Staff'), ['controller' => 'Staff', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staff', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="activities view large-9 medium-8 columns content">
    <h3><?= h($activity->activity_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project Detail') ?></th>
            <td><?= $activity->has('project_detail') ? $this->Html->link($activity->project_detail->id, ['controller' => 'ProjectDetailsOld', 'action' => 'view', $activity->project_detail->id]) : '' ?></td>
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
            <td><?= $activity->has('staff') ? $this->Html->link($activity->staff->id, ['controller' => 'Staff', 'action' => 'view', $activity->staff->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($activity->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lov') ?></th>
            <td><?= $activity->has('lov') ? $this->Html->link($activity->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $activity->lov->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $activity->has('user') ? $this->Html->link($activity->user->id, ['controller' => 'Users', 'action' => 'view', $activity->user->id]) : '' ?></td>
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

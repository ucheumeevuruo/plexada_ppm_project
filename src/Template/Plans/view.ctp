<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plan $plan
 */
?>

<div class="plans view large-9 medium-8 columns content">
    <h3><?= h($plan->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Activity') ?></th>
            <td><?= $plan->has('activity') ? $this->Html->link($plan->activity->next_activity, ['controller' => 'Activities', 'action' => 'view', $plan->activity->activity_id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($plan->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($plan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($plan->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($plan->end_date) ?></td>
        </tr>
    </table>
</div>
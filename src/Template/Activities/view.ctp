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



<div class="container-fluid py-4 border-top white-bg">
    <h3><?= h($activity->subject) ?></h3>
    <div class="row">
        <div class="col">
            <table class="table table-borderless" style="font-size:14px">
                <tr>
                    <th scope="row"><?= __('Project Detail') ?></th>
                    <td><?= $activity->has('project_detail') ? $this->Html->link($activity->project_detail->name, ['controller' => 'ProjectDetailsOld', 'action' => 'view', $activity->project_detail->id]) : '' ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Description') ?></th>
                    <td><?= h($activity->description) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Assigned To') ?></th>
                    <td><?= $activity->has('staff') ? $this->Html->link($activity->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $activity->staff->id]) : '' ?>
                </tr>
            </table>
        </div>
        <div class="col border-left">
            <table class="table table-borderless" style="font-size:14px">
                <tr>
                    <th scope="row"><?= __('Priority') ?></th>
                    <td><?= $activity->has('priority') ? $this->Html->link($activity->priority->lov_value, ['controller' => 'Lov', 'action' => 'view', $activity->priority->id]) : '' ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td><?= $activity->has('status') ? $this->Html->link($activity->status->lov_value, ['controller' => 'Lov', 'action' => 'view', $activity->status->id]) : '' ?>
                </tr>
                <tr>
                    <th scope="row"><?= __('Start Date') ?></th>
                    <td><?= h($activity->start_date) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('End Date') ?></th>
                    <td><?= h($activity->end_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
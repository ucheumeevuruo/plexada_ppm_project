<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailOld $projectDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Detail'), ['action' => 'edit', $projectDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Detail'), ['action' => 'delete', $projectDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sponsors'), ['controller' => 'Sponsors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsor'), ['controller' => 'Sponsors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectDetails view large-9 medium-8 columns content">
    <!-- Search form -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"><?= __('Project Details') ?></a>

    </nav>
    <br />
    <div class="btn-group" role="group" aria-label="Basic example">
        <?= html_entity_decode($this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $projectDetail->id], ['class' => 'btn btn-secondary'])) ?>

        <?= html_entity_decode($this->Html->link(__('<i class="fa fa-trash-o"></i>'), ['action' => 'delete', $projectDetail->id], ['class' => 'btn btn-secondary'])) ?>

    </div>
    <div class="clearfix"></div>
    <div class="col-md-6 float-left">
        <div class="table-responsive">
            <table class="table table-borderless no-border">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($projectDetail->Name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Description') ?></th>
                    <td><?= h($projectDetail->Description) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Location') ?></th>
                    <td><?= h($projectDetail->location) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Vendor') ?></th>
                    <td><?= $projectDetail->has('vendor') ? $this->Html->link($projectDetail->vendor->id, ['controller' => 'Vendors', 'action' => 'view', $projectDetail->vendor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Sponsor') ?></th>
                    <td><?= $projectDetail->has('sponsor') ? $this->Html->link($projectDetail->sponsor->id, ['controller' => 'Sponsors', 'action' => 'view', $projectDetail->sponsor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Current Status') ?></th>
                    <td><?= h($projectDetail->current_status) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Manager') ?></th>
                    <td><?= $projectDetail->staff->last_name ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-md-6 float-left">
        <div class="table-responsive">
            <table class="table table-borderless no-border">
                <tr>
                    <th scope="row"><?= __('Waiting On') ?></th>
                    <td><?= h($projectDetail->waiting_on) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Waiting Since') ?></th>
                    <td><?= h($projectDetail->waiting_since) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Start Dt') ?></th>
                    <td><?= h($projectDetail->start_dt) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('End Dt') ?></th>
                    <td><?= h($projectDetail->end_dt) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($projectDetail->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Last Updated') ?></th>
                    <td><?= h($projectDetail->last_updated) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clearfix"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"><?= __('Next Step') ?></a>

    </nav>

    <table cellpadding="0" cellspacing="0">
        <br />
        <div class="btn-group" role="group" aria-label="Basic example">
            <?= html_entity_decode($this->Html->link(__('<i class="fa fa-plus"></i>'), ['controller' => 'activities', 'action' => 'add', $projectDetail->id], ['class' => 'btn btn-secondary'])) ?>

        </div>
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('done') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Progress') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Assigned To') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Task Name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($projectDetail->activities as $activity): ?>
            <tr>
                <td><?= h($activity->current_activity) ?></td>
                <td><?= $activity->has('percentage_completion') ? $this->Number->format($activity->percentage_completion) . '%' : '0%'?></td>
                <td><?= $activity->has('staff') ? h($activity->staff->first_name . ' ' . $activity->staff->last_name) : ''?></td>
                <td><?= h($activity->description) ?></td>
                <td><?= h($activity->lov->lov_value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $activity->activity_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->activity_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->activity_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->activity_id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

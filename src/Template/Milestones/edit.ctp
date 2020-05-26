<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milestone $milestone
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $milestone->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $milestone->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Milestones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="conatiner">
    <?= $this->Form->create($milestone) ?>
    <fieldset>
        <legend class="font-weight-bolder text-center"><?= __('Edit Indicator') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <label class="control-label font-weight-bolder" for="project_id">Project Name</label>
                <?= $this->Form->control('project_id', ['options' => $projects, 'readonly' => true, 'label' => false]); ?>

                <label class="control-label font-weight-bolder" for="name">Indicator Name</label>
                <?= $this->Form->control('name', ['autocomplete' => 'off', 'label' => false]); ?>

                <label class="control-label font-weight-bolder" for="description">Description</label>
                <?= $this->Form->control('description', ['type' => 'textarea', 'label' => false]); ?>
                <?= $this->Form->hidden('status_id', ['value' => 1]); ?>
            </div>
            <div class="col-md-6">
                <label class="control-label font-weight-bolder" for="status_id">Status</label>
                <?= $this->Form->control('status_id', ['options' => $lov, 'label' => false]); ?>
                <?= $this->Form->hidden('trigger_id', ['options' => $triggers, 'empty' => true]); ?>

                <label class="control-label font-weight-bolder" for="amount">Amount</label>
                <?= $this->Form->control('amount', ['autocomplete' => 'off', 'label' => false]); ?>

                <label class="control-label font-weight-bolder" for="start_date">Start Date</label>
                <?= $this->Form->control('start_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'text', 'label' => false, 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>',]); ?>

                <label class="control-label font-weight-bolder" for="end_date">End Date</label>
                <?= $this->Form->control('end_date', ['autocomplete' => 'off', 'id' => 'end_date', 'type' => 'text', 'label' => false, 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>',]); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>


<script>
$(function() {
    $('#start_date, #end_date').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        startDate: "0d",
        // "endDate": "09-15-2017",
        "keyboardNavigation": false
    });
});
</script>
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
        <legend class="text-primary text-center"><?= __('Edit Indicator') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('project_id', ['options' => $projects, 'readonly' => true]); ?>
                <?= $this->Form->control('name', ['autocomplete' => 'off']); ?>
                <?= $this->Form->control('description', ['type' => 'textarea']); ?>
                <?= $this->Form->hidden('status_id', ['value' => 1]); ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('status_id', ['options' => $lov]); ?>
                <?= $this->Form->hidden('trigger_id', ['options' => $triggers, 'empty' => true]); ?>
                <?= $this->Form->control('amount', ['autocomplete' => 'off']); ?>
                <?= $this->Form->control('start_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'text']); ?>
                <?= $this->Form->control('end_date', ['autocomplete' => 'off', 'id' => 'end_date', 'type' => 'text']); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
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
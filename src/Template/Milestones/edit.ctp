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
        <?php
            echo $this->Form->control('record_number');
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('amount');
            echo $this->Form->control('payment',['options' => ['N','Y']]);
            echo $this->Form->control('status_id', ['options' => $lov]);
            echo $this->Form->control('description',['type'=>'textarea']);
            echo $this->Form->control('achievement');
            echo $this->Form->control('trigger_id', ['options' => $triggers, 'empty' => true , 'type'=>'hidden']);
            echo $this->Form->control('completed_date', ['empty' => true,'type'=>'text','class'=>'form-control-sm col-md-6', 'id'=>'completed_date']);
            echo $this->Form->input('expected_completion_date', ['empty' => true, 'type'=>'text', 'id'=>'expected_completion_date' ,'class'=>'form-control-sm col-md-6']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


<script>
$(function() {
    $('#completed_date, #expected_completion_date').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        startDate: "0d",
        // "endDate": "09-15-2017",
        "keyboardNavigation": false
    });
});
</script>
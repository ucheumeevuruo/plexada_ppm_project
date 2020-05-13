<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="container content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend><?= __('Add Task') ?></legend>
        <?php
        echo $this->Form->control('Task_name',['label'=>'Task Name','id' => 'Task_name', ]);
        echo $this->Form->control('Start_date', ['empty' => true, 'class' => 'addon-right', 'label' => 'Start Date', 'id' => 'Start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
        echo $this->Form->control('Description',['type'=>'textarea']);
        // echo $this->Form->control('Predecessor');
        // echo $this->Form->control('Successor');
        echo $this->Form->control('activities_id', ['options' => $activities_info, 'label' => 'Activity Name', 'empty' => true]);

        //
        ?>
        <div class="form-group select">
        <label class="control-label" for="activities-id">Status</label>
        <select name="status" class="form-control" id="status">
        <option value="0"></option>
        <option value="1">Completed</option>
        <option value="1">In-progress</option>
        <option value="1">Started</option>
        <option value="1">Delayed</option>
        </select>
        </div>
        <div class="form-group select">
        <label class="control-label" for="activities-id">Percentage Complete</label>
        <input text="number" max='100' min='0' id="percentage_completion" name="percentage_completion" class="form-control">
        </div>
        <?php
        echo $this->Form->control('Expected_end_date', ['empty' => true, 'class' => 'addon-right', 'label' => 'Expected End Date', 'id' => 'Start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$(function() {
    $('#Expected_end_date, #Start_date').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        startDate: "0d",
        // "endDate": "09-15-2017",
        "keyboardNavigation": false
    });
});
</script>

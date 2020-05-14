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
        <div class="row">
            <div class="col">
                <?php if(is_null($id)) echo $this->Form->control('activity_id', ['options' => $activities]); else ?>
                <?= $this->Form->hidden('activity_id', ['value' => $id]) ?>
                <?= $this->Form->control('Task_name', ['label'=>'Task Name','id' => 'Task_name', ]) ?>
                <?= $this->Form->control('Description', ['type'=>'textarea']) ?>
            </div>
            <div class="col">
                <?= $this->Form->control('Predecessor') ?>
                <?= $this->Form->control('Successor') ?>
                <?= $this->Form->control('Start_date', [
                        'empty' => true, 'class' => 'addon-right', 'label' => 'Start Date', 'id' => 'Start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off'
                ]) ?>
            </div>
        </div>
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

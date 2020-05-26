<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rask $task
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend><?= __('Edit Task') ?></legend>
        <div class="row">
            <div class="col">
                <?= $this->Form->hidden('activity_id') ?>
                <label class="control-label font-weight-bolder mandatory" for="Task_name">Task Name</label>
                <?= $this->Form->control('Task_name', ['label' => false, 'id' => 'Task_name',]) ?>

                <label class="control-label font-weight-bolder mandatory" for="Description">Description</label>
                <?= $this->Form->control('Description', ['type' => 'textarea', 'label' => false]) ?>
            </div>
            <div class="col">
                <label class="control-label font-weight-bolder" for="Predecessor">Predecessor</label>
                <?= $this->Form->control('Predecessor', ['label' => false]) ?>

                <label class="control-label font-weight-bolder" for="Successor">Successor</label>
                <?= $this->Form->control('Successor', ['label' => false]) ?>

                <label class="control-label font-weight-bolder mandatory" for="Start_date">Start
                    Date</label>
                <?= $this->Form->control('Start_date', [
                    'empty' => true, 'class' => 'addon-right', 'label' => false, 'id' => 'Start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off'
                ]) ?>

                <label class="control-label font-weight-bolder mandatory" for="end_date">End Date</label>
                <?= $this->Form->control('end_date', [
                    'empty' => true, 'class' => 'addon-right', 'label' => false, 'id' => 'Start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off'
                ]) ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
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
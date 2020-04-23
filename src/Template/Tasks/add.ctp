<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend><?= __('Add Task') ?></legend>
        <?php
        echo $this->Form->control('Name');
        echo $this->Form->control('start_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'Start Date', 'id' => 'datepicker', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
        echo $this->Form->control('Description');
        echo $this->Form->control('Predecessor');
        echo $this->Form->control('Successor');
        echo $this->Form->control('project_id', ['options' => $projects, 'label' => 'Project Id']);

        //
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$(function() {
    $('#datepicker, #datepicker1').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        startDate: "0d",
        // "endDate": "09-15-2017",
        "keyboardNavigation": false
    });
});
</script>

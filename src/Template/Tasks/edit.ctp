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
        <?php
        echo $this->Form->control('Name');
        echo $this->Form->control('Start Date');
        echo $this->Form->control('Description',['text'=>'textarea']);
        echo $this->Form->control('Predecessor');
        echo $this->Form->control('Successor');
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
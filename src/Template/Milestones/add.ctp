<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milestone $milestone
 */
?>

<div class="milestones container">
    <?= $this->Form->create($milestone) ?>
    <fieldset>
        <legend class="text-primary text-center"><?= __('Add Milestone') ?></legend>
        <?php
            echo $this->Form->control('record_number');
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('amount');
            echo $this->Form->control('payment');
            echo $this->Form->control('status_id', ['options' => $lov]);
            echo $this->Form->control('description');
            echo $this->Form->control('achievement');
            echo $this->Form->control('trigger_id', ['options' => $triggers, 'empty' => true]);
            // echo $this->Form->control('completed_date', ['empty' => true,'id'=>'completed_date']);
            echo $this->Form->control('completed_date', ['empty' => true, 'class' => 'addon-right', 'label' => 'Completed Date', 'id' => 'completed_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
            echo $this->Form->control('expected_completion_date', ['empty' => true, 'class' => 'addon-right', 'label' => 'Expected Completion Date', 'id' => 'expected_completion_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
                 // echo $this->Form->control('expected_completion_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
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
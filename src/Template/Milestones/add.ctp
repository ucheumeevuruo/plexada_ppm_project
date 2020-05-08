+<?php
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

<div class="milestones container">
    <?= $this->Form->create($milestone) ?>
    <fieldset>
        <legend class="text-primary text-center"><?= __('Add Indicator') ?></legend>
        <?php
            // echo $this->Form->control('record_number');
            echo $this->Form->control('project_id', ['options' => $projects, 'text'=>'hidden']);
            echo $this->Form->control('amount',['label' => 'Amount (USD)']);
            echo $this->Form->control('payment',['options'=>['N','Y'],'empty' => true]);
            echo $this->Form->control('status_id', ['options' => $lov]);
        ?>
            <div class="form-group text"><label class="control-label" for="description">Description</label>
            <input type="text" name="description" class="form-control" id="description">
            </div>

        <?php
            // echo $this->Form->control('description');
            echo $this->Form->control('achievement');
            echo $this->Form->control('trigger_id', ['options' => $triggers, 'empty' => true, 'type'=>'hidden']);
            // echo $this->Form->control('completed_date', ['empty' => true,'id'=>'completed_date']);
            echo $this->Form->control('completed_date', ['empty' => true, 'class' => 'addon-right', 'label' => 'Start Date', 'id' => 'completed_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
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

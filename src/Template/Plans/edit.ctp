<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plan $plan
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="plans form large-9 medium-8 columns content">
    <?= $this->Form->create($plan) ?>
    <fieldset>
        <legend><?= __('Plan Monitoring') ?></legend>
        <?php
        echo $this->Form->control('activity_id', ['value'=>$sid,'type'=>'hidden']);
        echo $this->Form->control('name',['readonly']);
        // echo $this->Form->control('title');
        // echo $this->Form->control('comment', ['type' => 'textArea']);
        // echo $this->Form->control('plan_type', ['options' => [
        //     'Inspection' => 'Inspection', 'Assessment' => 'Assessment', 'Evaluation' => 'Evaluation'
        // ]]);
        // echo $this->Form->control('assigned_to_id', ['options' => $staff]);
        // echo $this->Form->control('user_id', ['value'=>$logged_in_user,'type'=>'hidden']);
        echo $this->Form->control('start_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'hidden', 'label' => 'State date', 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>']);
        echo $this->Form->control('end_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'hidden', 'label' => 'End date', 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>']);
        echo $this->Form->control('approved', ['options' => ['1' => 'Yes', '0' => 'No'],'empty'=>true]);
        echo $this->Form->control('status', ['options' => ['completed' => 'completed', 'in-progress' => 'in-progress'],'empty'=>true]);
        ?>

        <div id="inputEnv">
            <div class="input-group mb-3">
                <input type="file" name="environmental_factors" class="form-control m-input"
                    placeholder="" autocomplete="off">
                <div class="input-group-append">
                    <button id="removeEnv" type="button" class="btn btn-danger">Remove</button>
                </div>
            </div>
        </div>
        <div id="newEnv"></div>
        <div class="float-right">
        <button id="addEnv" type="button" class="btn btn-primary mb-3">Add File</button>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$("#addEnv").click(function() {
    var html = '';
    html += '<div id="inputEnv">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="file" name="file" class="form-control m-input" placeholder="Environmental factor" autocomplete="off">';
    html += '<div class="input-group-append">';
    html += '<button id="removeEnv" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';
    html += '</div>';

    $('#newEnv').append(html);
});
// remove row
$(document).on('click', '#removeEnv', function() {
    $(this).closest('#inputEnv').remove();
});


$(function() {
    $('#start_date, #end_date').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        // startDate: "0d"
    }).on('changeDate', function(selected) {
        let date = new Date(selected);
        date.setDate(date.getDate() + 1);
        // $('#end_date').datepicker({inline: true,startDate : date});
    })
    
});
</script>
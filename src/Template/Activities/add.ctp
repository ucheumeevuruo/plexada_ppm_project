<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();

echo $this->Html->css('mandatory');
?>
<div class="activities container-fluid">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend class="font-weight-bolder text-center"><?= __('Add Activities') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php
                if ($project_id == null)
                    echo $this->Form->control('project_id', ['options' => $projectDetails, 'empty' => true]);
                else
                    echo $this->Form->hidden('project_id', ['value' => $project_id, 'empty' => false]);
                ?>
                <label class="control-label mandatory font-weight-bolder " for="milestone_id">Indicator</label>
                <?php echo $this->Form->control('milestone_id', ['options' => $milestones, 'label' => false]); ?>

                <label class="control-label mandatory font-weight-bolder " for="name">Activity Name</label>
                <?php echo $this->Form->control('name', ['autocomplete' => 'off', 'label' => false]); ?>

                <label class="control-label mandatory font-weight-bolder " for="description">Description</label>
                <?php
                echo $this->Form->control('description', ['type' => 'textarea', 'label' => false]);
                echo $this->Form->hidden('activity_type_id', ['value' => 12]);
                echo $this->Form->hidden('status_id', ['value' => 1]);
                ?>
            </div>

            <div class="col-md-6">
                <label class="control-label font-weight-bolder " for="assigned_to_id">Assigned To</label>
                <?php
                echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true, 'label' => false]);
                echo $this->Form->hidden('priority_id', ['value' => 5]);
                echo $this->Form->hidden('currency_id', ['value' => $currency->project_detail->currency->id]);
                ?>
                <label class="control-label font-weight-bolder " for="start_date">Start Date</label>
                <?php echo $this->Form->control('start_date', ['empty' => true, 'class' => 'addon-right', 'label' => false, 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>

                <label class="control-label font-weight-bolder " for="end_date">End Date</label>
                <?php echo $this->Form->control('end_date', ['empty' => true, 'class' => 'addon-right', 'label' => false, 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>

                <label class="control-label font-weight-bolder " for="cost">Cost</label>
                <?php echo $this->Form->control('cost', ['autocomplete' => 'off', 'label' => false]); ?>
            </div>
        </div>
        <?php
        //            if($project_id == null)
        //                echo $this->Form->control('project_id', ['options' => $projectDetails, 'empty' => true]);
        //            else
        //                    echo $this->Form->control('project_id', ['options' => [$project_id], 'default' => $project_id, 'empty' => false, 'type' => 'hidden']);
        ////            echo $this->Form->control('current_activity');
        ////            echo $this->Form->control('waiting_on');
        ////            echo $this->Form->control('waiting_since', ['empty' => true]);
        //            echo $this->Form->control('next_activity', ['label' => 'Step']);
        //            echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true]);
        //            echo $this->Form->control('percentage_completion', ['type' => 'number', 'max' => 100]);
        //            echo $this->Form->control('priority_id', ['options' => $lov]);
        //            echo $this->Form->control('description', ['type' => 'textarea']);
        //            echo $this->Form->control('last_updated');
        //            echo $this->Form->control('system_user_id', ['options' => $users, 'empty' => true]);
        ?>

    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
    <?= $this->Form->end() ?>
</div>


<script>
    <?php $code_array = json_encode($startDate) ?>
    var array_code = <?php echo $code_array; ?>;
    $(function($array_code) {
        $('#start_date, #end_date').datepicker({
            inline: true,
            "format": "dd/mm/yyyy",
            startDate: <?php echo $code_array; ?>,
            // endDate: "09-15-2017",
            // "endDate": "09-15-2017",
            "keyboardNavigation": false
        });
    });
</script>
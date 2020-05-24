<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="activities container-fluid">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend class="text-primary text-center"><?= __('Edit Activities') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php echo $this->Form->hidden('project_id', ['options' => $projectDetails, 'empty' => true]); ?>

                <label class="control-label mandatory font-weight-bolder text-success" for="name">Activity Name</label>
                <?php echo $this->Form->control('name', ['autocomplete' => 'off', 'label' => false]); ?>

                <label class="control-label mandatory font-weight-bolder text-success"
                    for="description">Description</label>
                <?php echo $this->Form->control('description', ['type' => 'textarea', 'label' => false]); ?>

                <label class="control-label font-weight-bolder text-success" for="assigned_to_id">Assigned To</label>
                <?php
                echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true, 'label' => false]);
                echo $this->Form->hidden('activity_type_id', ['value' => 12]);
                ?>

                <label class="control-label font-weight-bolder text-success" for="status_id">Status</label>
                <?php echo $this->Form->control('status_id', ['options' => $status, 'label' => false]); ?>
            </div>
            <div class="col-md-6">
                <label class="control-label font-weight-bolder text-success" for="priority_id">Priority</label>
                <?php echo $this->Form->control('priority_id', ['options' => $priority, 'empty' => true, 'label' => false]); ?>

                <?php echo $this->Form->hidden('currency_id', ['value' => '1']); ?>

                <label class="control-label font-weight-bolder text-success" for="start_date">Start Date</label>
                <?php echo $this->Form->control('start_date', ['empty' => true, 'class' => 'addon-right', 'label' => false, 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>

                <label class="control-label font-weight-bolder text-success" for="end_date">End Date</label>
                <?php echo $this->Form->control('end_date', ['empty' => true, 'class' => 'addon-right', 'label' => false, 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>

                <label class="control-label font-weight-bolder text-success" for="cost">Cost</label>
                <?php echo $this->Form->control('cost', ['autocomplete' => 'off', 'label' => false]); ?>
            </div>
        </div>
        <!--        --><?php
                        //            echo $this->Form->control('project_id', ['options' => $projectDetails, 'empty' => true, 'type' => 'hidden']);
                        //            echo $this->Form->control('current_activity');
                        ////            echo $this->Form->control('waiting_on');
                        ////            echo $this->Form->control('waiting_since', ['empty' => true]);
                        //            echo $this->Form->control('next_activity');
                        //            echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true]);
                        //            echo $this->Form->control('percentage_completion');
                        //            echo $this->Form->control('description');
                        //            echo $this->Form->control('priority_id', ['options' => $lov, 'empty' => true]);
                        ////            echo $this->Form->control('last_updated');
                        //        
                        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
    <?= $this->Form->end() ?>
</div>


<script>
$(function() {
    $('#start_date, #end_date').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        // "endDate": "09-15-2017",
        "keyboardNavigation": false
    });
});
</script>
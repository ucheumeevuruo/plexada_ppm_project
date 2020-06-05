<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<?= $this->Html->script('mychart.js') ?>
<div class="activities container-fluid">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend class=" text-center"><?= __('Edit Activities') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php echo $this->Form->hidden('project_id', ['options' => $projectDetails, 'empty' => true]); ?>

                <label class="control-label mandatory font-weight-bolder" for="name">Activity Name</label>
                <?php echo $this->Form->control('name', ['autocomplete' => 'off', 'label' => false]); ?>

                <label class="control-label mandatory font-weight-bolder" for="description">Description</label>
                <?php echo $this->Form->control('description', ['type' => 'textarea', 'label' => false]); ?>

                <label class="control-label font-weight-bolder" for="assigned_to_id">Assigned To</label>
                <?php
                echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true, 'label' => false]);
                echo $this->Form->hidden('activity_type_id', ['value' => 12]);
                ?>

                <label class="control-label font-weight-bolder" for="status_id">Status</label>
                <?php echo $this->Form->control('status_id', ['options' => $status, 'label' => false]); ?>
            </div>
            <div class="col-md-6">
                <label class="control-label font-weight-bolder" for="priority_id">Priority</label>
                <?php echo $this->Form->control('priority_id', ['options' => $priority, 'empty' => true, 'label' => false]); ?>

                <?php echo $this->Form->hidden('currency_id', ['value' => '1']); ?>

                <label class="control-label font-weight-bolder" for="start_date">Start Date</label>
                <?php echo $this->Form->control('start_date', ['empty' => true, 'class' => 'addon-right', 'label' => false,'onblur'=>"javascript:checkForDate();", 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off','required']); ?>

                <label class="control-label font-weight-bolder" for="end_date">End Date</label>
                <?php echo $this->Form->control('end_date', ['empty' => true, 'class' => 'addon-right', 'label' => false,'onblur'=>"javascript:checkForDate();", 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off','required']); ?>

                <label class="control-label font-weight-bolder" for="cost">Cost</label>
                <?php echo $this->Form->control('cost', ['autocomplete' => 'off', 'label' => false]); ?>

                <label class="control-label font-weight-bolder" for="percentage_completion">Sub Status</label>
                <?php echo $this->Form->control('percentage_completion', ['options' => $substatus, 'label' => false]); ?>
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
            startDate: "<?php echo $s_date; ?>",
            endDate: "<?php echo $e_date; ?>",
            "keyboardNavigation": false
        });
    });
</script>
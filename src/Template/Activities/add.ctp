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
        <legend><?= __('Add Next Step') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php
                    if($project_id == null)
                        echo $this->Form->control('project_id', ['options' => $projectDetails, 'empty' => true]);
                    else
                        echo $this->Form->control('project_id', ['options' => [$project_id], 'default' => $project_id, 'empty' => false, 'type' => 'hidden']);
                    echo $this->Form->hidden('activity_type_id', ['options' => [12], 'default' => 12, 'empty' => false]);
                    echo $this->Form->control('description', ['type' => 'textarea']);
                    echo $this->Form->control('priority_id', ['options' => $priority, 'empty' => true]);
                    echo $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                    echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true]);
                    echo $this->Form->control('start_date', ['empty' => true, 'class' => 'addon-right', 'label' => 'Start Date', 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
                    echo $this->Form->control('end_date', ['empty' => true, 'class' => 'addon-right', 'label' => 'End Date', 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
                    echo $this->Form->control('currency_id', ['options' => $currency, 'empty' => true]);
                    echo $this->Form->control('cost');
                ?>
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
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    // ////Date picker
    $(document).ready(function(){
        // ////Date picker
        $(function() {
            $('#waiting_since, #start_date, #end_date').datepicker({
                inline: true,
                "format": "dd/mm/yyyy",
                startDate: "0d",
                // "endDate": "09-15-2017",
                "keyboardNavigation": false
            });
        });
    });
</script>

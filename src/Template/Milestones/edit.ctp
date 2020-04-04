<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milestone $milestone
 */
?>
<div class="milestones container-fluid">
    <?= $this->Form->create($milestone) ?>
    <fieldset>
        <legend><?= __('Edit Milestones/Achievements') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php
//                echo $this->Form->control('record_number');
                echo $this->Form->hidden('project_id');
                echo $this->Form->control('description', ['type' => 'textarea']);
                echo $this->Form->control('amount', ['min' => 0, 'prepend' => '<i class="addon-left">₦</i>', 'class' => 'addon-left']);
                echo $this->Form->control('status_id', ['options' => $lov]);
                echo $this->Form->control('payment', ['type' => 'checkbox']);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $this->Form->control('trigger_id', ['options' => $trigger]);
                echo $this->Form->control('achievement', ['type' => 'textarea']);
                echo $this->Form->control('expected_completion_date', ['empty' => true, 'id' => 'datepicker', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
                ?>
            </div>
        </div>
        <?php
//            echo $this->Form->control('record_number');
////            echo $this->Form->control('project_id', ['options' => $projectDetails]);
//            echo $this->Form->control('amount');
//            echo $this->Form->control('payment', ['options' => ['Y' => 'Paid', 'N' => 'Not Paid'], 'empty' => true]);
//            echo $this->Form->control('status_id', ['options' => $lov]);
//            echo $this->Form->control('description');
//            echo $this->Form->control('achievement');
//            echo $this->Form->control('expected_completion_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    $(function () {
        $('#datepicker, #datepicker1').datepicker({
            inline: true,
            "format": "dd/mm/yyyy",
            startDate: "0d",
            // "endDate": "09-15-2017",
            "keyboardNavigation": false
        });
    });
</script>

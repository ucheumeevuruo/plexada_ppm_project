<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RiskIssue $riskIssue
 */
?>
<div class="riskIssues container-fluid">
    <?= $this->Form->create($riskIssue) ?>
    <fieldset>
        <legend><?= __('Add Risk Issue') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php
                echo $this->Form->control('record_number');
                echo $this->Form->hidden('project_id', ['options' => $projectDetails]);
                echo $this->Form->control('description', ['type' => 'textarea']);
                echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $this->Form->hidden('status_id', ['options' => $lov, 'default' => 1]);
                echo $this->Form->control('remediation');
                echo $this->Form->control('issue');
                echo $this->Form->control('impact_id');
                echo $this->Form->control('expected_resolution_date', ['empty' => true, 'id' => 'datepicker', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
                ?>
            </div>
        </div>
        <?php
        //            echo $this->Form->control('record_number');
        //            echo $this->Form->control('project_id', ['options' => $projectDetails]);
        //            echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true]);
        //            echo $this->Form->control('status_id');
        //            echo $this->Form->control('remediation');
        //            echo $this->Form->control('description');
        //            echo $this->Form->control('issue');
        //            echo $this->Form->control('impact_id', ['options' => $lov, 'empty' => true]);
        //            echo $this->Form->control('expected_resolution_date', ['empty' => true, 'id' => 'datepicker', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
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
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="projectDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($projectDetail) ?>

        <input type="hidden" name="name" id="name" value="<?= $project_info->name ?>"
                class="form-control addon-right" empty="1" id="description" autocomplete="off">
        <input type="hidden" name="project_id" id="project_id" value="<?= $project_info->id ?>" />

                <input type="hidden" name="description" value="<?= $project_info->introduction ?>"
                class="form-control addon-right" empty="1" id="description" autocomplete="off">

                <input type="hidden" name="location" value="<?= $project_info->location ?>"
                class="form-control addon-right" empty="1" id="location" autocomplete="off">

    <fieldset>
        <legend class="text-primary"><?= __('Edit Project Detail') ?></legend>
        <div class="col-sm-6 float-left">
            <div class="mb-3">
                <!-- <?= $this->Html->link(__('Add Objectives'), ['controller' => 'objectives', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?> -->
            </div>
            <?php
                echo $this->Form->control('manager_id', ['options' => $staff, 'empty' => true]);
                echo $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true,'label'=>'Project Sponsor']);
                echo $this->Form->control('donor_id', ['options' => $donors, 'empty' => true]);
                echo $this->Form->control('mda_id', ['options' => $mdas, 'empty' => true, 'label'=>'M D A']);
                echo $this->Form->control('DLI');

            ?>
        </div>
        <div class="col-sm-6 float-left">
            <!-- <?= $this->Html->link(__('Add Milestones'), ['controller' => 'milestones', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 mt-5 mb-3 overlay']) ?> -->
            <?= $this->Form->control('environmental_factors'); ?>

            <?= $this->Form->control('start_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'Proposed Start Date', 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>
            <?= $this->Form->control('end_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'Proposed End Date', 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>
            <?= $this->Form->control('currency_id', ['options' => $currencies, 'empty' => true]); ?>

            <?php
            echo $this->Form->control('budget');
            echo $this->Form->control('expenses');
            echo $this->Form->control('risk_and_issues');
            echo $this->Form->control('project_id', ['type' => 'hidden']);
            ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
    <?= $this->Form->end() ?>
</div>

<script>
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
</script>

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

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<div class="projectDetails container-fluid mb-4 mt-4">
    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'index']) ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">PAD</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->


    <?= $this->Form->create($projectDetail) ?>
    <h3 class="text-center">Edit Project Details</h3>

    <fieldset class="col-md-6 float-left mb-3" style="border: #464751 1px solid;">
        <legend>Project Definition</legend>

        <div class="col-sm-6 float-left">
            <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description', ['label' => 'Brief']);
            echo $this->Form->control('location');
            ?>
            <div class="mb-3">
                <!-- <?= $this->Html->link(__('Add Objectives'), ['controller' => 'objectives', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?> -->
            </div>
    </fieldset>
    <fieldset class="col-md-6 float-right mb-3" style="border: #464751 1px solid;">
        <legend>Project Stakeholders</legend>
        <?php
        echo $this->Form->control('manager_id', ['options' => $staff, 'empty' => true]);
        echo $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true, 'label' => 'Project Sponsor']);
        echo $this->Form->control('donor_id', ['options' => $donors, 'empty' => true]);
        echo $this->Form->control('mda_id', ['options' => $mdas, 'empty' => true]);
        // echo $this->Form->control('DLI');
        ?>
    </fieldset>
    <fieldset class="col-md-6 float-left mb-3" style="border: #494B55 1px solid;">
        <legend>Project Funding</legend>
        <?= $this->Form->control('currency_id', ['options' => $currencies, 'empty' => true]); ?>
        <?php echo $this->Form->control('budget'); ?>
        <?php echo $this->Form->control('expenses'); ?>
    </fieldset>
    <fieldset class="col-md-6 float-right mb-3" style="border: #464751 1px solid;">
        <legend>Project Duration</legend>
        <?= $this->Form->control('start_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'Start Date', 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>
        <?= $this->Form->control('end_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'End Date', 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>
    </fieldset>

    <div class="col-md-6 float-left mb-3">
        <!-- <?= $this->Html->link(__('Add Milestones'), ['controller' => 'milestones', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 mt-5 mb-3 overlay']) ?> -->
        <?= $this->Form->control('environmental_factors'); ?>
    </div>
    <div class="col-md-6 float-right mb-3">



        <?php echo $this->Form->control('risk_and_issues'); ?>
        <?php echo $this->Form->control('project_id', ['type' => 'hidden']); ?>
    </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
    <?= $this->Form->end() ?>
</div>
</div>

<script>
// ////Date picker
$(function() {
    $('#waiting_since, #start_dt, #end_dt').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        startDate: "0d",
        // "endDate": "09-15-2017",
        "keyboardNavigation": false
    });
});
</script>
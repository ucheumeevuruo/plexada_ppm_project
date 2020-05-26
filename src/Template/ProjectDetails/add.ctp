<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
 */
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
$this->start('sidebar');
echo $this->element('sidebar/default');
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
    <h3 class="text-center">Project Design</h3>
    <fieldset class="col-md-6 float-left mb-3" style="border: #464751 1px solid;">
        <legend>Project Definition</legend>

        <label class="control-label" for="project">Project</label>
        <div class="input-group mb-3"><input type="text" name="name" id="name" value="<?= $project_info->name ?>"
                class="form-control addon-right" empty="1" id="description" autocomplete="off">
        </div>
        <input type="hidden" name="project_id" id="project_id" value="<?= $project_info->id ?>" />

        <label class="control-label" for="description">Brief</label>
        <div class="input-group mb-3"><input type="text" name="description" value="<?= $project_info->introduction ?>"
                class="form-control addon-right" empty="1" id="description" autocomplete="off">
        </div>

        <label class="control-label" for="location">Location</label>
        <div class="input-group mb-3"><input type="text" name="location" value="<?= $project_info->location ?>"
                class="form-control addon-right" empty="1" id="location" autocomplete="off">
        </div>
    </fieldset>

    <fieldset class="col-md-6 float-right mb-3" style="border: #464751 1px solid;">
        <legend>Project Stakeholders</legend>
        <?= $this->Form->control('beneficiary', ['empty' => true,]); ?>
        <?= $this->Form->control('manager_id', ['options' => $staff, 'empty' => true]); ?>
        <?= $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true]); ?>

        <?= $this->Form->control('donor_id', ['options' => $donors, 'empty' => true, 'label' => 'Source of Funds']); ?>
        <?= $this->Form->control('mda_id', ['options' => $mdas, 'empty' => true, 'label' => 'MDA']); ?>
    </fieldset>



    <!-- row 2/ pim starts -->

    <!-- <?= $this->Form->control('priority_id', ['options' => $priority]); ?> -->
    <!-- <?= $this->Form->hidden('completed_percent', ['value' => 0]); ?> -->



    <div>

        <?= $this->Html->link(__('Add Indicator'), ['controller' => 'milestones', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 mt-5 mb-3 overlay hidden', 'style' => "display: none"]) ?>

        <!--            <div id="inputEnv">-->
        <!--                <div class="input-group mb-3">-->
        <!--                    <input type="text" name="environmental_factors" class="form-control m-input"-->
        <!--                        placeholder="Environmental factor" autocomplete="off">-->
        <!--                    <div class="input-group-append">-->
        <!--                        <button id="removeEnv" type="button" class="btn btn-danger">Remove</button>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!-- <?= $this->Form->control('environmental_factors'); ?> -->
        <div id="newEnv"></div>
        <button id="addEnv" type="button" class="btn btn-primary mb-3" style="display: none">Add Environmental
            Factor</button>
    </div>
    <fieldset class="col-md-6 float-left mb-3" style="border: #494B55 1px solid;">
        <legend>Project Funding</legend>
        <?= $this->Form->control('currency_id', ['options' => $currencies, 'empty' => true]); ?>

        <?= $this->Form->control('budget', ['placeholder' => '0.00']); ?>

        <?= $this->Form->control('expenses', ['placeholder' => '0.00']); ?>
    </fieldset>
    <fieldset class="col-md-6 float-right mb-3" style="border: #464751 1px solid;">
        <legend>Project Duration</legend>
        <?= $this->Form->control('start_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'Start Date', 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>
        <?= $this->Form->control('end_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'End Date', 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>

    </fieldset>
    <fieldset style="border: #464751 1px solid;">

        <?= $this->Form->control('financing_agreement', ['options' => [
            'None' => 'None', 'Multilateral' => 'Multilateral',
            'Bilateral' => 'Bilateral', 'Others' => 'Others'
        ], 'empty' => true]); ?>
        <?= $this->Form->control('funding_type', ['options' => [
            'None' => 'None', 'Donor' => 'Donor', 'PPP' => 'PPP',
            'Grant' => 'Grant', 'Loan' => 'Loan', 'Grant' => 'Grant', 'Others' => 'Others'
        ], 'empty' => true]); ?>
    </fieldset>

    <?= $this->Form->control('risk_and_issues'); ?>

    <div class=" col-md-12 float-md-none">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- <?= $this->Form->control('risks'); ?> -->
<!-- <?= $this->Form->control('components'); ?> -->
<!-- <?= $this->Form->control('price', ['options' => $prices]); ?> -->
<!-- <label class="control-label" for="price">Cost(USD)</label>
            <div class="input-group"><input type="text" name="price" value="" class="form-control addon-right" empty="1"
                    id="price"> -->
<!-- <?= $this->Form->control('project_id', ['options' => $projects]); ?> -->
<!-- <?= $this->Form->control('name'); ?> -->
<!-- <?= $this->Form->control('description'); ?> -->
<!-- <?= $this->Form->control('location'); ?> -->
<!-- <?= $this->Form->control('vendor_id', ['options' => $vendors, 'empty' => true]); ?> -->

<!-- <?= $this->Form->control('waiting_since', ['empty' => true]); ?> -->
<!-- <?= $this->Form->control('start_dt', ['empty' => true]); ?> -->
<!-- <?= $this->Form->control('end_dt', ['empty' => true]); ?> -->
<!-- <?= $this->Form->control('last_updated'); ?> -->
<!-- <?= $this->Form->control('priority_id', ['options' => $lov]); ?> -->
<!-- <?= $this->Form->control('status_id', ['options' => $lov]); ?> -->
<!-- <?= $this->Form->control('sub_status_id', ['options' => $lov]); ?> -->
<!-- <?= $this->Form->control('system_user_id', ['options' => $users]); ?> -->
<!-- <?= $this->Form->control('annotation_id', ['options' => $annotations, 'empty' => true]); ?> -->
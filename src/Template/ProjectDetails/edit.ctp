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

<?php echo $this->Html->css('mandatory'); ?>
<?= $this->Html->script('mychart.js') ?>
<div class="projectDetails form large-9 medium-8 columns content">
    <h3 class="text-center">Project Design</h3>

    <?= $this->Form->create($projectDetail) ?>
    <fieldset class="col-md-6 float-left mb-2" style="border: #464751 1px solid;">
        <legend class="font-weight-bolder">Project Definition</legend>

        <label class="control-label mandatory font-weight-bolder" for="project">Project Name</label>
        <div class="input-group mb-3"><input type="text" name="name" id="name" value="<?= $project_info->name ?>" class="form-control addon-right" empty="1" autocomplete="off">
        </div>
        <input type="hidden" name="project_id" id="project_id" value="<?= $project_info->id ?>" />

        <label class="control-label mandatory font-weight-bolder" for="description">Brief</label>
        <div class="input-group mb-3"><input type="text" name="description" value="<?= $project_info->introduction ?>" class="form-control addon-right" empty="1" id="description" autocomplete="off">
        </div>

        <label class="control-label mandatory font-weight-bolder" for="location">Location</label>
        <div class="input-group mb-3"><input type="text" name="location" value="<?= $project_info->location ?>" class="form-control addon-right" empty="1" id="location" autocomplete="off">
        </div>
        <!-- <?php
                echo $this->Form->control('name', ['label' => 'Project Name', 'value' => $project_info->name]);
                echo $this->Form->control('description', ['label' => 'Brief', 'value' => $project_info->introduction]);
                echo $this->Form->control('location', ['label' => 'Location', 'value' => $project_info->location]);
                ?> -->
        <div class="mb-3">
            <!-- <?= $this->Html->link(__('Add Objectives'), ['controller' => 'objectives', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?> -->
        </div>
    </fieldset>
    <fieldset class="col-md-6 float-right mb-4" style="border: #464751 1px solid;">
        <legend class="font-weight-bolder">Project Duration</legend>
        <label class="control-label font-weight-bolder" for="start_dt">Start Date</label>
        <div class="input-group mb-3"><input type="text" name="start_dt" value="<?= $projectDetail->start_dt ?>" class="form-control" empty="1" id="start_dt" autocomplete="off" onchange="dateCheck();" required><i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>
        </div>
        <label class="control-label font-weight-bolder" for="end_dt">End Date</label>
        <div class="input-group mb-3"><input type="text" name="end_dt" value="<?= $projectDetail->end_dt ?>" class="form-control" empty="1" id="end_dt" autocomplete="off" onchange="dateCheck();" required><i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>
        </div>
        <!-- <?= $this->Form->control('start_dt', ['empty' => true, 'class' => 'addon-right mb-0 mt-0', 'label' => 'Start Date ', 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?> -->
        <!-- <?= $this->Form->control('end_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'End Date', 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?> -->

    </fieldset>
    <fieldset class="col-md-6 float-right mb-4" style="border: #464751 1px solid;">
        <legend class="font-weight-bolder">Project Stakeholders</legend>

        <?= $this->Form->control('beneficiary', ['empty' => true, 'label' => ['class' => 'font-weight-bolder']]); ?>

        <?= $this->Form->control('manager_id', ['options' => $staff, 'empty' => true, 'label' => ['class' => 'font-weight-bolder']]); ?>

        <?= $this->Form->control('project.project_sponsor.sponsor_id', ['options' => $sponsors, 'empty' => true, 'label' => ['class' => 'font-weight-bolder', 'text' => 'Sponsor']]); ?>

        <?= $this->Form->control('project.project_donor.sponsor_id', ['options' => $donors, 'empty' => true, 'label' => ['class' => 'font-weight-bolder', 'text' => 'Funding Agency']]); ?>

        <?= $this->Form->control('project.project_mda.sponsor_id', ['options' => $mdas, 'empty' => true, 'label' => ['class' => 'font-weight-bolder', 'text' => 'MDA']]); ?>
        <!-- echo $this->Form->control('DLI'); -->
    </fieldset>
    <fieldset class="col-md-6 float-left mb-2" style="border: #494B55 1px solid;">
        <legend class="font-weight-bolder">Project Funding</legend>

        <label class="control-label font-weight-bolder" for="currency_id">Currency</label>
        <?= $this->Form->control('currency_id', ['options' => $currencies, 'empty' => true, 'label' => false]); ?>

        <label class="control-label font-weight-bolder" for="budget">Budget</label>
        <?= $this->Form->control('budget', ['placeholder' => '0.00', 'pattern' => '^\d+(\.|\,)\d{2}$', 'label' => false, 'step' => 500000]); ?>

        <label class="control-label font-weight-bolder" for="expenses">Annual Disbursement</label>
        <?= $this->Form->control('expenses', ['placeholder' => '0.00', 'label' => false, 'step' => 500000]); ?>
    </fieldset>

    <fieldset class="col-md-6 float-left mb-5" style="border: #464751 1px solid;">
        <legend class="font-weight-bolder">Agreements</legend>

        <label class="control-label font-weight-bolder" for="financing_agreement">Financial
            Agreement</label>
        <?= $this->Form->control('financing_agreement', ['options' => [
            'None' => 'None', 'Multilateral' => 'Multilateral',
            'Bilateral' => 'Bilateral', 'Others' => 'Others'
        ], 'empty' => true, 'label' => false]); ?>

        <label class="control-label font-weight-bolder" for="funding_type">Funding Type</label>
        <?= $this->Form->control('funding_type', ['options' => [
            'None' => 'None', 'Donor' => 'Donor', 'PPP' => 'PPP',
            'Grant' => 'Grant', 'Loan' => 'Loan', 'Grant' => 'Grant', 'Others' => 'Others'
        ], 'empty' => true, 'label' => false]); ?>
    </fieldset>
    <fieldset class="col-md-6 float-right mb-3" style="border: #464751 1px solid;">
        <!-- <?= $this->Form->control('environmental_factors'); ?> -->

        <!-- <label class="control-label mandatory font-weight-bolder" for="risk_and_issues">Risks</label> -->
        <div class="input-group mb-3">
            <!-- <textarea class="form-control" rows="3" name="risk_and_issues" id="risk_and_issues" value="<?= $projectDetail->risk_and_issues ?>"><?= $projectDetail->risk_and_issues ?></textarea> -->
            <?php echo $this->Form->control('risk_and_issues', ['options' => [
                'High' => 'High', 'Low' => 'Low', 'Moderate' => 'Moderate', 'Substantial' => 'Substantial'], 
                'label' => ['class' => 'mandatory', 'text' => 'Risk']]);
            ?>
        </div>
        <?php
        echo $this->Form->control('project_id', ['type' => 'hidden']);
        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary float-right']) ?>
    <?= $this->Form->end() ?>
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
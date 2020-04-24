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
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="projectDetails container-fluid">
    <?= $this->Form->create($projectDetail) ?>
    <fieldset>
        <legend class="bg-primary text-light mb-3 text-center"><?= __('Add PAD') ?></legend>
        <div class="col-md-6 float-left">
            <?= $this->Form->control('project_id', ['options' => $projects]); ?>
            <!-- <?= $this->Form->control('name'); ?> -->

            <label class="control-label" for="description">Description</label>
            <div class="input-group"><input type="text" name="description" value="<?= $project_info->introduction ?>"
                    class="form-control addon-right" empty="1" id="description" autocomplete="off">
                <!-- <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span> -->
            </div>

            <label class="control-label" for="location">Location</label>
            <div class="input-group"><input type="text" name="location" value="<?= $project_info->location ?>"
                    class="form-control addon-right" empty="1" id="location" autocomplete="off">
                <!-- <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span> -->
            </div>

            <!-- <?= $this->Form->control('description'); ?> -->
            <!-- <?= $this->Form->control('location'); ?> -->
            <!-- <?= $this->Form->control('vendor_id', ['options' => $vendors, 'empty' => true]); ?> -->
            <?= $this->Form->control('manager_id', ['options' => $staff, 'empty' => true]); ?>
            <!-- <?= $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true]); ?> -->
            <!-- <div class="form-group text"> -->
            <label class="control-label" for="waiting_since">Waiting since</label>
            <div class="input-group"><input type="text" name="waiting_since" class="form-control addon-right" empty="1"
                    id="waiting_since" autocomplete="off">
                <span class="input-group-addon"><i
                        class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
            </div>
            <!-- </div> -->

            <!-- <?= $this->Form->control('waiting_since', ['empty' => true]); ?> -->
            <?= $this->Form->control('waiting_on_id', ['options' => $staff, 'empty' => true]); ?>

            <?= $this->Form->control('status_id', ['options' => $lov]); ?>

            <label class="control-label" for="start_dt">Start date</label>
            <div class="input-group"><input type="text" name="start_dt" class="form-control addon-right" empty="1"
                    id="start_dt" autocomplete="off">
                <span class="input-group-addon"><i
                        class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
            </div>

            <label class="control-label" for="end_dt">End date</label>
            <div class="input-group"><input type="text" name="end_dt" class="form-control addon-right" empty="1"
                    id="end_dt" autocomplete="off">
                <span class="input-group-addon"><i
                        class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
            </div>

            <!-- <?= $this->Form->control('start_dt', ['empty' => true]); ?> -->
            <!-- <?= $this->Form->control('end_dt', ['empty' => true]); ?> -->
            <!-- <?= $this->Form->control('last_updated'); ?> -->
            <?= $this->Form->control('priority_id', ['options' => $lov]); ?>
        </div>
        <div class="col-md-6 float-left">


            <?= $this->Html->link(__('Add Milestones'), ['controller' => 'milestones', 'action' => 'add'], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?>
            <?= $this->Form->control('system_user_id', ['options' => $users]); ?>

            <!-- <?= $this->Form->control('annotation_id', ['options' => $annotations, 'empty' => true]); ?> -->

            <!-- ///////////////////////////// -->
            <div id="inputEnv">
                <div class="input-group mb-3">
                    <input type="text" name="environmental_factors" class="form-control m-input"
                        placeholder="Environmental factor" autocomplete="off">
                    <div class="input-group-append">
                        <button id="removeEnv" type="button" class="btn btn-danger">Remove</button>
                    </div>
                </div>
            </div>

            <div id="newEnv"></div>
            <button id="addEnv" type="button" class="btn btn-primary mb-5">Add Environmental Factor</button>

            <!-- ////////////////////////////////////////// -->

            <!-- <?= $this->Form->control('environmental_factors'); ?> -->

            <!-- <?= $this->Form->control('partners'); ?> -->
            <!-- <?= $this->Form->control('funding_agencies'); ?> -->

            <div id="inputFA">
                <div class="input-group mb-3">
                    <input type="text" name="funding_agencies" class="form-control m-input" placeholder="Funding Agency"
                        autocomplete="off">
                    <div class="input-group-append">
                        <button id="removeFA" type="button" class="btn btn-danger">Remove</button>
                    </div>
                </div>
            </div>

            <div id="newFA"></div>
            <button id="addFA" type="button" class="btn btn-primary mb-5">Add Funding Agency</button>



            <!-- <?= $this->Form->control('approval'); ?> -->
            <!-- <?= $this->Form->control('risks'); ?> -->
            <!-- <?= $this->Form->control('components'); ?> -->
            <!-- <?= $this->Form->control('price ', ['options' => $prices]); ?> -->
            <!-- <label class="control-label" for="price">Cost(USD)</label>
            <div class="input-group"><input type="text" name="price" value="" class="form-control addon-right" empty="1"
                    id="price"> -->
            <?= $this->Form->control('sub_status_id', ['options' => $lov]); ?>
        </div>
    </fieldset>
    <div class="col-md-12 float-md-none">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>


<script type="text/javascript">
// add new env. factors
$("#addEnv").click(function() {
    var html = '';
    html += '<div id="inputEnv">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="text" name="title[]" class="form-control m-input" placeholder="Environmental factor" autocomplete="off">';
    html += '<div class="input-group-append">';
    html += '<button id="removeEnv" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';
    html += '</div>';

    $('#newEnv').append(html);
});

// remove row
$(document).on('click', '#removeEnv', function() {
    $(this).closest('#inputEnv').remove();
});


// ///////////////////ADD FA///

$("#addFA").click(function() {
    var html = '';
    html += '<div id="inputFA">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="text" name="title[]" class="form-control m-input" placeholder="Funding Agency" autocomplete="off">';
    html += '<div class="input-group-append">';
    html += '<button id="removeFA" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';
    html += '</div>';

    $('#newFA').append(html);
});

// remove row
$(document).on('click', '#removeFA', function() {
    $(this).closest('#inputFA').remove();
});


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
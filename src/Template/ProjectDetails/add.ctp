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

<div class="projectDetails container-fluid">
    <?= $this->Form->create($projectDetail) ?>
    <fieldset>
        <legend class="bg-primary text-light mb-3 text-center"><?= __('Add Project Details') ?></legend>
        <div class="col-md-6 float-left">

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
            <div class="mb-3">
                <?= $this->Html->link(__('Add Objectives'), ['controller' => 'objectives', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?>
            </div>

            <?= $this->Form->control('manager_id', ['options' => $staff, 'empty' => true]); ?>
            <?= $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true]); ?>

            <?= $this->Form->control('donor_id', ['options' => $donors, 'empty' => true]); ?>
            <?= $this->Form->control('mda_id', ['options' => $mdas, 'empty' => true,'label'=>'MDA']); ?>

            <?= $this->Form->control('DLI',['label'=>'DLI']); ?>

        </div>


        <div class="col-md-6 float-left">

            <?= $this->Html->link(__('Add Indicator'), ['controller' => 'milestones', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 mt-5 mb-3 overlay']) ?>

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
            <button id="addEnv" type="button" class="btn btn-primary mb-3">Add Environmental Factor</button>

            <div class="form-group text">
                <label class="control-label" for="start_dt">Start date</label>
                <div class="input-group"><input type="text" name="start_dt" class="form-control addon-right" empty="1"
                        id="start_dt" autocomplete="off">
                    <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0 ml-5"></i></span>
                </div>
            </div>

            <div class="form-group text">
                <label class="control-label" for="end_dt">End date</label>
                <div class="input-group"><input type="text" name="end_dt" class="form-control addon-right" empty="1"
                        id="end_dt" autocomplete="off">
                    <span class="input-group-addon"><i
                            class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                </div>
            </div>

            <label for="cars">Currency</label>
            <select id="cars" name="currency" class="mb-3">
                <option value="naira">NGN</option>
                <option value="dollar">USD</option>
                <option value="euro">EU</option>
                <option value="pound">GBP</option>
            </select>

            <?= $this->Form->control('budget'); ?>

            <?= $this->Form->control('expenses'); ?>
            <?= $this->Form->control('risk_and_issues'); ?>

        </div>
    </fieldset>
    <div class="col-md-12 float-md-none">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

            <!-- <?= $this->Form->control('risks'); ?> -->
            <!-- <?= $this->Form->control('components'); ?> -->
            <!-- <?= $this->Form->control('price ', ['options' => $prices]); ?> -->
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



<!-- MODAL ELEMENTS -->

<div id="dialogModal" class="bg-primary">
    <!-- the external content is loaded inside this tag -->
    <div id="contentWrap">
        <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-md']) ?>
        <?= $this->Modal->body()// No header ?>
        <?= $this->Modal->footer()// Footer with close button (default) ?>
        <?= $this->Modal->end() ?>
    </div>
    <div id="uploadContent">
        <?= $this->Modal->create(['id' => 'upload', 'size' => 'modal-sm']) ?>
        <?= $this->Modal->body('
            <form>
                <div class="form-group">
                <label for="exampleFormControlFile1">Import file</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </form>
        ')// No header ?>
        <?= $this->Modal->footer()// Footer with close button (default) ?>
        <?= $this->Modal->end() ?>
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

// ADD OBJ
$("#addObj").click(function() {
    var html = '';
    html += '<div id="inputObj">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="text" name="title[]" class="form-control m-input" placeholder="Objective" autocomplete="off">';
    html += '<div class="input-group-append">';
    html += '<button id="removeObj" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';
    html += '</div>';

    $('#newObj').append(html);
});

// remove row
$(document).on('click', '#removeObj', function() {
    $(this).closest('#inputObj').remove();
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


$(document).ready(function() {
            //respond to click event on anything with 'overlay' class
            $(".overlay").click(function(event){
                event.preventDefault();
                //load content from href of link
                $('#contentWrap .modal-body').load($(this).attr("href"), function(){
                    $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content').removeClass()
                    $('#MyModal4').modal('show')
                });
            });

            $(".upload").click(function (event) {
                event.preventDefault();
                $("#upload").modal('show')
            })
            $('.dataTable').DataTable();
});
</script>

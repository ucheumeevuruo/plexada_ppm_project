<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailOld $projectDetail
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

<div class="container-fluid" id="main">
    <div class="card shadow mb-4 " style="padding: 20px 20px 0 20px">
        <div class="me-dropdowns input-group mb-4" style="display: flex; justify-content:space-between;">

            <div class="dropdown mr-5">
                <h6 class="font-weight-bold">Summarize Information</h6>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Progress Status
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Not yet started</a>
                    <a class="dropdown-item" href="#">In progress</a>
                    <a class="dropdown-item" href="#">Completed</a>
                </div>
            </div>
            <div class="dropdown mr-6">
                <h6 class="font-weight-bold">Summarize Information</h6>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    First Day of Month
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Not yet started</a>
                    <a class="dropdown-item" href="#">In progress</a>
                    <a class="dropdown-item" href="#">Completed</a>
                </div>
            </div>
            <div class="dropdown mr-5">
                <h6 class="font-weight-bold">Show</h6>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Projects
                </button>
                <div class="dropdown-menu ">
                    <!-- <a class="dropdown-item" href="#">In progress</a>
                    <a class="dropdown-item" href="#">Completed</a> -->
                    <?= $this->Html->link(
                        __(' <i class="btn  btn-info "  style="width: 100px">Summary</i>'),
                        ['controller' => 'ProjectDetails', 'action' => 'summary'],
                        ['escape' => false, 'class' => 'nav-link collapsed']
                    ) ?>
                    <!-- <?= $this->Html->link(
                                __(' <i id="print" class="btn  btn-success" style="width: 100px">Report</i> '),
                                ['controller' => 'ProjectDetails', 'action' => 'summary'],
                                ['escape' => false, 'class' => 'nav-link collapsed']
                            ) ?> -->
                    <button id="print" class="btn btn-info " style="width: 100px; margin-left: 15px;">Report</button>
                </div>
            </div>
            <div>

                <div style=" display: flex; flex-direction:row; justify-content:space-around; outline: 5px solid #4E73DF; padding-left: 22px"
                    class="input-group">
                    <div class="dropdown mr-auto">
                        <div>

                            <h6 class="font-weight-bold">Date Field</h6>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                First Day of Month
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Not yet started</a>
                                <a class="dropdown-item" href="#">In progress</a>
                                <a class="dropdown-item" href="#">Completed</a>
                            </div>
                        </div>
                        <div class="bootstrap-iso">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-12">

                                        <!-- Form code begins -->
                                        <form method="post" style="display: flex;">
                                            <div class="form-group">
                                                <!-- Date input -->
                                                <label class="control-label" for="date">From</label>
                                                <input class="form-control" id="date" name="from"
                                                    placeholder="MM/DD/YYY" type="text"
                                                    style="background-color: #CDD8F6; border-color: #4E73DF; border-width: medium;" />
                                            </div>

                                        </form>
                                        <!-- Form code ends -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown mr-auto" style="width: 200px;">
                        <div>

                            <h6 class="font-weight-bold">Range</h6>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Previous Month

                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Not yet started</a>
                                <a class="dropdown-item" href="#">In progress</a>
                                <a class="dropdown-item" href="#">Completed</a>
                            </div>
                        </div>
                        <div class="bootstrap-iso">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-12">

                                        <!-- Form code begins -->
                                        <form method="post" style="display: flex;">
                                            <div class="form-group">
                                                <!-- Date input -->
                                                <label class="control-label" for="date">To</label>
                                                <input class="form-control" id="date" name="date"
                                                    placeholder="MM/DD/YYY" type="text"
                                                    style="background-color: #CDD8F6; border-color: #4E73DF; border-width: medium;" />
                                            </div>

                                        </form>
                                        <!-- Form code ends -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="">
            <button type="button" class="btn btn-primary mr-4 mb-sm-4">Run Report</button>
            <button type="button" class="btn btn-primary mr-4 mb-sm-4" style="height: 40px;">
                <?= $this->Html->link(
                    __('<i style="color: white;">Show Details</i>'),
                    ['controller' => 'ProjectDetails', 'action' => 'summary'],
                    ['escape' => false, 'class' => 'nav-link ']
                ) ?>
            </button>
            <button type="button" class="btn btn-primary mr-4 mb-sm-4">
                <!-- <?= $this->Html->link('export', ['controller' => 'projectdetails', 'action' => 'export', '_ext' => 'csv']) ?> -->
                Save As
            </button>
            <button type="button" class="btn btn-primary mr-4 mb-sm-4">
                <!-- <?php echo $this->Html->link('Download', array('controller' => 'projectdetails', 'action' => 'download'), array('target' => '_blank')); ?> -->
                Download Report
            </button>
            <button type="button" id="print1" class="btn btn-primary mr-4 mb-sm-4">Printable view

            </button>

            <button type="button" class="btn btn-primary mr-4 mb-sm-4">Export Details</button>
        </div>
        <hr>
        <div>
        </div>
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable table-primary table-hover br-m"
                role="grid" aria-describedby="dataTable_info">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col" class="text-white"><?= __('S/N  ') ?></th>
                        <th scope="col" class="text-white"><?= __('Project Name') ?></th>
                        <th scope="col" class="text-white"><?= __('Donor/Lender') ?></th>
                        <th scope="col" class="text-white"><?= __('Funding Type') ?></th>
                        <th scope="col" class="text-white"><?= __('Funding Amount') ?></th>
                        <th scope="col" class="text-white"><?= __('Core Objectives') ?></th>
                        <th scope="col" class="text-white"><?= __('Core Achievement') ?></th>
                        <th scope="col" class="text-white"><?= __('Project State Date') ?></th>
                        <th scope="col" class="text-white"><?= __('Project Completion Date') ?></th>
                        <th scope="col" class="text-white"><?= __('Status') ?></th>
                        <th scope="col" class="text-white"><?= __('Key Challenge') ?></th>
                        <th scope="col" class="text-white"><?= __('Next Action Plan ') ?></th>
                        <th scope="col" class="text-white"><?= __('Remarks') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 0; ?>
                    <?php foreach ($projectDetails as $projectDetail) : ?>
                    <?php $num++; ?>
                    <tr>
                        <!-- <td style="width:5%">1</td> -->
                        <td style="width:5%" style="color: black !important;"><?= h($num) ?></td>
                        <td><?= $this->Html->link($projectDetail->name, ['controller' => 'project-details', 'action' => 'view', $projectDetail->id], ['id' => 'transmit']) ?>
                        </td>

                        <th scope="col" class="text-blue" style="color: black !important;"><?= __('World Bank') ?></th>
                        <th scope="col" class="text-blue" style="color: black !important;"><?= __('Loan and Grant') ?>
                        </th>
                        <th scope="col" class="text-blue" style="color: black !important;"><?= __('$4,000,000') ?></th>
                        <th scope="col" class="text-blue" style="color: black !important;">
                            <?= __('Facilitation of key investors and investment projects to Ogun State') ?>
                        </th>
                        <th scope="col" class="text-blue" style="color: black !important;">
                            <?= __('IPA law now passed by the House of Assembly, to be gazetted') ?></th>
                        <th scope="col" class="text-blue" style="color: black !important;">
                            <?= h($projectDetail->start_dt) ?></th>
                        <th scope="col" class="text-blue" style="color: black !important;">
                            <?= h($projectDetail->end_dt) ?></th>
                        <th scope="col" class="text-blue" style="background-color: green; color: black !important;">
                            <?= __(' ') ?></th>
                        <th scope="col" class="text-blue" style="background-color: red; color: black !important;">
                            <?= __('Essential resources including human and equipment still in process') ?></th>
                        <th scope="col" class="text-blue" style="background-color: yellow; color: black !important;">
                            <?= __('Identifying Moribund companies and validation of existing investor list ongoing') ?>
                        </th>
                        <th scope="col" class="text-blue" style="color: black !important;">
                            <?= __('PC to ensure we gain much traction on this project and others under economic transformation program') ?>
                        </th>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- overlayed element -->
    <div id="dialogModal">
        <!-- the external content is loaded inside this tag -->
        <div id="contentWrap">
            <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-lg']) ?>
            <?= $this->Modal->body() // No header 
            ?>
            <?= $this->Modal->footer() // Footer with close button (default) 
            ?>
            <?= $this->Modal->end() ?>
        </div>
    </div>
</div>

<!-- printable view -->

<div class=”row" style="display:none;  width: 1000px; margin-left: 100px;" id="report">
    <div class=”col-6 align-self-center”>
        <h4 class="d-flex justify-content-center bold"><strong>OGUN STATE GOVERNMENT</strong></h4>
        <h4 class="d-flex justify-content-center bold"><strong>DEVELOPMENT PARTNERS COORDINATION</strong></h4>
        <h4 class="d-flex justify-content-center bold"><strong>PROJECT REPORT TEMPLATE</strong></h4>
        <hr style="height: 10px;">
    </div>
    <div>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">PROJECT NAME: &nbsp; <strong
                class="text-capitalize">
                Drilling of Borehole </strong></P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">DONOR/LENDER: &nbsp; <strong>World Bank</strong>
        </P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">FUNDING TYPE: &nbsp; <strong>Load and
                Grant</strong></P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">IMPLEMENTING AGENCY: &nbsp; <strong>Adewale
                Holdings</strong>
        </P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">FUNDING AMOUNT: &nbsp; <strong>$4, 000,
                000</strong></P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">DISBURSEMENT TO DATE: &nbsp; <strong>$1, 000,
                000</strong>
        </P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">COUNTERPART FUND REQUIRED: &nbsp;
            <strong>$3, 000, 000</strong></P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">PARTICIPATING LGAs: &nbsp; <strong>Otta </strong>
        </P>
        <P class="mb-2 font-weight-bold" style="margin-left: 100px;">DATE OF REPORT: &nbsp; <strong>April 23,
                2020</strong></P>
    </div>

    <div style="width: 900px;">
        <p style="margin-left: 100px" class="font-weight-bold">Project Objectives and Milestones</p>
        <table style="margin-left: 100px; outline: 1px solid black;" cellpadding="0" cellspacing="0"
            class="table table-sm table-bordered br-m">
            <thead class="bg-default" style="outline: 1px solid black;">
                <tr>
                    <th style="outline: 1px solid black; color: black !important; width:5%;">S/N</th>
                    <th style="outline: 1px solid black; color: black !important;">Project Objectives</th>
                    <th style="outline: 1px solid black; color: black !important;">Milestone activities</th>
                    <th style="outline: 1px solid black; color: black !important;">Deadline</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="outline: 1px solid black;">1.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="outline: 1px solid black;">2.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="outline: 1px solid black;">3.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="outline: 1px solid black;">4.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
            </tbody>
        </table>

        <p style="margin-left: 100px" class="font-weight-bold">Activity Report</p>
        <table style="margin-left: 100px;" cellpadding="0" cellspacing="0" class="table table-sm table-bordered br-m">
            <thead class="bg-default">
                <tr>
                    <th style="outline: 1px solid black; color: black !important;  width:5%;">S/N</th>
                    <th style="outline: 1px solid black; color: black !important; ">Milestone activities</th>
                    <th style="outline: 1px solid black; color: black !important; ">Update</th>
                    <th style="outline: 1px solid black; color: black !important; ">Achievement Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="outline: 1px solid black;">1.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="outline: 1px solid black;">2.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="outline: 1px solid black;">3.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="outline: 1px solid black;">4.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h6 style="font-weight:bolder; margin-left: 100px;" class="font-weight-bold">CHALLENGES/ISSUES:</h6>
    </div>
    <div style="width: 900px;">
        <p style="margin-left: 100px" class="font-weight-bold">Next Step/Action Plan: </p>
        <table style="margin-left: 100px; padding-right: 100px;" cellpadding="0" cellspacing="0"
            class="table table-sm table-bordered br-m">
            <thead class="bg-default">
                <tr>
                    <th style="width:5%; outline: 1px solid black; color: black !important;">S/N</th>
                    <th style="outline: 1px solid black; color: black !important;">Milestone activities</th>
                    <th style="outline: 1px solid black; color: black !important;">Next Step/ Action Plan</th>
                    <th style="outline: 1px solid black; color: black !important;">Timeline</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="outline: 1px solid black;">1.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="outline: 1px solid black;">2.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="outline: 1px solid black;">3.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="outline: 1px solid black;">4.</td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                    <td style="outline: 1px solid black;"></td>
                </tr>
            </tbody>
        </table>
        <p style="margin-left: 100px" class="font-weight-bold">Prepared by: </p>
        <br>
        <p style="margin-left: 100px; margin-bottom: 100px;" class="font-weight-bold"> State Programme Coordinator </p>

    </div>

</div>
<script>
$(document).ready(function() {
    $("#print").click(function() {
        $("#report").show();
        $("#main").hide();

    });
    $("#print1").click(function() {
        $("#report").show();
        $("#main").hide();

    });

    //respond to click event on anything with 'overlay' class
    $(".overlay").click(function(event) {
        event.preventDefault();
        //load content from href of link
        $('#contentWrap .modal-body').load($(this).attr("href"), function() {
            $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content')
                .removeClass()
            $('#MyModal4').modal('show')
        });
    });
    var date_input = $('input[name="date"]'); //our date input has the name "date"
    var container =
        $(".bootstrap-iso form").length > 0 ?
        $(".bootstrap-iso form").parent() :
        "body";
    var options = {
        format: "mm/dd/yyyy",
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
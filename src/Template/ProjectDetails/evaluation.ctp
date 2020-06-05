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


<div class="container-fluid" id="main">
    <div class="card shadow mb-4 " style="padding: 20px 20px 0 20px">
        <div class="me-dropdowns input-group mb-4" style="display: flex; justify-content:space-between;">

            <!-- <div class="dropdown mr-5">
                <h6 class="font-weight-bold">Summarize Information</h6>
                <select class="form-control" id="cars" style="width: 200px;">
                    <option style="font-weight:bold; " value="green">Select Status
                    </option>
                    <option style="font-weight:bold; color: white; background-color: green;" value="green">Project
                        Active and On-Track!</option>
                    <option style="font-weight:bold; color: white; background-color: red;" value="red">Project active
                        but major concerns, needs corrective action!</option>
                    <option style="font-weight:bold; color: black; background-color: yellow;" value="yellow">Project
                        active but limited concerns, needs close monitoring!</option>
                    <option style="font-weight:bold; color: black; background-color: white;" value="white">Project about
                        to Kick-Off!</option>
                    <option style="font-weight:bold; color: white; background-color: black;" value="black">Project
                        Completed</option>
                    <option style="font-weight:bold; color: white; background-color: blue;" value="blue">Project
                        on-hold!</option>
                </select>
            </div> -->

            <div class="dropdown mr-6">
                <h6 class="font-weight-bold">Summarize Information</h6>
                <div>
                    <?= $this->Form->create(); ?>
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control" placeholder="Date of Report" name="reportdate">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                    <!-- <?php echo $fromnumber; ?> -->


                </div>

            </div>
            <div class="dropdown mr-6">

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
                    <!-- <button id="print" class="btn btn-info " style="width: 100px; margin-left: 15px;">Report</button> -->
                </div>
            </div>
            <div>
                <div>
                </div>
                <div style="display: flex; flex-direction:row; justify-content:space-around; outline: 2px solid #4E73DF; padding-left: 22px; " class="input-group">
                    <div class="dropdown">
                        <div>
                            <h6 class="font-weight-bold">Project start Date </h6>
                            <div class="dropdown-menu">
                            </div>
                        </div>
                        <div class="bootstrap-iso">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="">
                                        <div class="form-group" style="display: flex; flex-direction: column;">
                                            <!-- Date input -->
                                            <div class="input-group date" data-provide="datepicker" style="background-color: #CDD8F6; border-color: #4E73DF; border-width: medium;">
                                                <input type="text" class="form-control" placeholder="MM/DD/YYY" name="from" id='from' autocomplete="off"/>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <div>

                            <h6 class="font-weight-bold">Project End date</h6>
                            <div class="dropdown-menu">
                            </div>
                        </div>
                        <div class="bootstrap-iso">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="">
                                        <div class="form-group" style="display: flex; flex-direction: column; margin-left: -20px;">

                                            <div class="input-group date" data-provide="datepicker" style="background-color: #CDD8F6; border-color: #4E73DF; border-width: medium;">
                                                <input type="text" class="form-control" placeholder="MM/DD/YYY" name="to" id='to' autocomplete="off"/>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Select'), ["class" => "btn-primary "]) ?>
                </div>
            </div>

        </div>
    </div>
    <?= $this->Form->end() ?>

    <div class="">
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

        <button type="button" class="btn btn-primary mr-4 mb-sm-4">Printable view

        </button>

        <button type="button" class="btn btn-primary ml-4 mb-sm-4" id="exp" onclick="exportTableToExcel('table2excel',filename ='summary report');">Export to Excel</button>

    </div>
    <hr>
    <div>
    </div>
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" id="table2excel" class="table table-bordered dataTable table-primary table-hover br-m" role="grid" aria-describedby="dataTable_info">
            <thead class="bg-primary">
                <tr>
                    <th scope="col" class="text-white"><?= __('S/N  ') ?></th>
                    <th scope="col" class="text-white"><?= __('Project Name') ?></th>
                    <th scope="col" class="text-white"><?= __('Donor/Lender') ?></th>
                    <th scope="col" class="text-white"><?= __('Funding Type') ?></th>
                    <th scope="col" class="text-white"><?= __('Budget') ?></th>
                    <th scope="col" class="text-white"><?= __('Description') ?></th>
                    <th scope="col" class="text-white"><?= __('Beneficiary') ?></th>
                    <!-- <th scope="col" class="text-white"><?= __('Core Achievement') ?></th> -->
                    <th scope="col" class="text-white"><?= __('Project State Date') ?></th>
                    <th scope="col" class="text-white"><?= __('Project Completion Date') ?></th>
                    <th scope="col" class="text-white"><?= __('Status') ?></th>
                    <th scope="col" class="text-white"><?= __('Key Challenge') ?></th>
                    <!-- <th scope="col" class="text-white"><?= __('Next Action Plan ') ?></th> -->
                </tr>
            </thead>

            <tbody id="selected-projects">
                <?php if (isset($fromnumber)) { ?>

                    <?php $num = 0; ?>
                    <?php foreach ($projectDetails as $projectDetail) : ?>
                        <?php $startdate = h($projectDetail->start_dt); ?>
                        <?php $enddate = h($projectDetail->end_dt); ?>
                        <?php $startdatenumber = strtotime($startdate); ?>
                        <?php $enddatenumber = strtotime($enddate); ?>
                        <?php if (($startdatenumber >= $fromnumber) && ($enddatenumber <= $tonumber)) : ?>
                            <?php $num++; ?>
                            <tr>
                                <td style="width:5%" style="color: black !important;"><?= h($num) ?></td>
                                <td id="print2">
                                    <?= $this->Html->link($projectDetail->name, ['controller' => 'projectDetails', 'action' => 'printable', $projectDetail->id]) ?>
                                </td>
                                <th scope="col" class="text-blue" style="color: black !important;">
                                    <?php foreach ($sponsors as $sponsor) : ?>
                                        <?php if ($sponsor->id == $projectDetail->sponsor_id) : ?>
                                            <?= h($sponsor->last_name) ?> <?= h($sponsor->first_name) ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </th>
                                <th scope="col" class="text-blue" style="color: black !important;">
                                    <?= h($projectDetail->funding_type) ?>
                                </th>
                                <th scope="col" class="text-blue" style="color: black !important;">
                                    <?= $this->NumberFormat->format($projectDetail->budget, ['before' => $projectDetail->has('currency') ? $projectDetail->currency->symbol : '']) ?>

                                </th>
                                <th scope="col" class="text-blue" style="color: black !important;">
                                    <?= h($projectDetail->description) ?>
                                </th>
                                <th scope="col" class="text-blue" style="color: black !important;">
                                    <?= h($projectDetail->beneficiary) ?>
                                </th>
                                <th scope="col" class="text-blue" style="color: black !important;">
                                    <?= h($projectDetail->start_dt) ?></th>
                                <th scope="col" class="text-blue" style="color: black !important;">
                                    <?= h($projectDetail->end_dt) ?></th>
                                <th scope="col" class="text-blue" style="color: black !important;">
                                    <?= __(' ') ?></th>
                                <th scope="col" class="text-blue" style="color: black !important;">
                                    <?= h($projectDetail->risk_and_issues) ?></th>
                                </th>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
<!-- overlayed element -->

</div>

<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />


<script>
    $(document).ready(function() {
        $("#print").click(function() {
            $("#report").show();
            $("#main").hide();

        });
        $("#print2").click(function() {
            $("#report").show();
            $("#main").hide();

        });
        $("#clicked").click(function() {
            $("#selected-projects").show();
            $("#allprojects").hide();

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

    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>
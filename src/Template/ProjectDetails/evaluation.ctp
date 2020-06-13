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
                    <div class="form-group">
                        <div class="input-group date" data-provide="datepicker" id='datetimepicker1'>
                            <input type="text" class="form-control" placeholder="Date of Report" name="reportdate" autocomplete="off">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(function() {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>

            </div>
            <div class="dropdown mr-6">

                <h6 class="font-weight-bold">Show</h6>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    Projects
                </button>
                <div class="dropdown-menu ">
                    <?= $this->Html->link(
                        __(' <i class="btn  btn-info "  style="width: 100px">Summary</i>'),
                        ['controller' => 'ProjectDetails', 'action' => 'summary'],
                        ['escape' => false, 'class' => 'nav-link collapsed']
                    ) ?>
                </div>
            </div>
            <div>
                <div>
                </div>
                <div style=" outline: 5px solid #36B9CC; border-radius: 0 20px 20px 0" class="input-group outline-info">

                    <div>
                        <h6 class="font-weight-bold text-dark text-center">Reporting Period </h6>

                        <div style="display: flex; ">
                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group" style="display: flex; ">
                                                <!-- Date input -->
                                                <div class="input-group date" data-provide="datepicker">
                                                    <input type="text" class="form-control" placeholder="MM/DD/YYYY" name="from" id='from' autocomplete="off" />
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group" style="display: flex; ">
                                                <div class="input-group date" data-provide="datepicker">
                                                    <input type="text" class="form-control" placeholder="MM/DD/YYYY" name="to" id='to' autocomplete="off" />
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?= $this->Form->button(__('Select'), ["class" => "btn-info "]) ?>
                </div>
            </div>

        </div>
    </div>
    <?= $this->Form->end() ?>

    <div class="">
        <button type="button" class="btn btn-info mr-4 mb-sm-4" style="height: 40px;">
            <?= $this->Html->link(
                __('<i style="color: white;">Show Details</i>'),
                ['controller' => 'ProjectDetails', 'action' => 'summary'],
                ['escape' => false, 'class' => 'nav-link ']
            ) ?>
        </button>
        <button type="button" class="btn btn-info mr-4 mb-sm-4">
            <!-- <?= $this->Html->link('export', ['controller' => 'projectdetails', 'action' => 'export', '_ext' => 'csv']) ?> -->
            Save As
        </button>

        <button type="button" class="btn btn-info mr-4 mb-sm-4">Printable view

        </button>

        <button type="button" class="btn btn-info ml-4 mb-sm-4" id="exp" onclick="exportTableToExcel('table2excel',filename ='summary report');">Export to Excel</button>

    </div>
    <hr>
    <div>
    </div>
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" id="table2excel" class="table  table-bordered dataTable table-default br-m table-striped table-sm" role="grid" aria-describedby="dataTable_info" style="height: 100px;">
            <thead class="table-dark text-center align-text-middle">
                <tr>
                    <th scope="col"><?= __('S/N  ') ?></th>
                    <th scope="col"><?= __('Project Name') ?></th>
                    <th scope="col"><?= __('Donor/Lender') ?></th>
                    <th scope="col"><?= __('Funding Type') ?></th>
                    <th scope="col"><?= __('Budget') ?></th>
                    <th scope="col"><?= __('Beneficiary') ?></th>
                    <th scope="col"><?= __('Achievements') ?></th>
                    <th scope="col" class="text-white"><?= __('Next Action Plan ') ?></th>
                    <th scope="col"><?= __('Start Date') ?></th>
                    <th scope="col"><?= __('Completion Date') ?></th>
                    <th scope="col"><?= __('Risk and Issues') ?></th>
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
                                <td style="width:5%"><?= h($num) ?></td>
                                <td id="print2">
                                    <?= $this->Html->link($projectDetail->name, ['controller' => 'projectDetails', 'action' => 'printable', $projectDetail->id], []) ?>
                                </td>
                                <th scope="col">
                                    <?php foreach ($sponsors as $sponsor) : ?>
                                        <?php if ($sponsor->id == $projectDetail->sponsor_id) : ?>
                                            <?= h($sponsor->last_name) ?> <?= h($sponsor->first_name) ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </th>
                                <th scope="col"><?= h($projectDetail->funding_type) ?></th>
                                <th scope="col">
                                    <?= $this->NumberFormat->format($projectDetail->budget, ['before' => $projectDetail->has('currency') ? $projectDetail->currency->symbol : '']) ?>
                                </th>
                                <th scope="col"><?= h($projectDetail->beneficiary) ?></th>
                                <th scope="col">
                                    <?php $serial = 1; ?>
                                    <?php foreach ($activities as $activity) : ?>
                                        <?php if ($projectDetail->project_id == $activity->project_id && $activity->status_id == 3) : ?>
                                            <p><?= h($serial++) ?>. <?= h($activity->name) ?></p>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </th>
                                <th scope="col">
                                    <?php $serial1 = 1; ?>
                                    <?php foreach ($activities as $activity) : ?>
                                        <?php if ($projectDetail->project_id == $activity->project_id && $activity->status_id == 1) : ?>
                                            <p><?= h($serial1++) ?>. <?= h($activity->name) ?></p>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </th>
                                <th scope="col"><?= h($projectDetail->start_dt) ?></th>
                                <th scope="col"><?= h($projectDetail->end_dt) ?></th>
                                <th scope="col"><?= h($projectDetail->risk_and_issues) ?></th>
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

<!-- MODAL ELEMENTS -->

<div id="dialogModal" class="bg-primary">
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
<!--  jQuery -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> -->

<!-- Bootstrap Date-Picker Plugin -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" /> -->




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
            keyboardNavigation: false,
            inline: true,


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
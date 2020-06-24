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

            <div class="dropdown mr-6">
                <h6 class="font-weight-bold">Summarize Information</h6>
                <div>
                    <?= $this->Form->create(); ?>
                    <!-- <input type="text" value="<?= $from; ?>" name="datefrom" id="datefrom">
                    <input type="text" value="<?= $to; ?>" name = "dateto" id="dateto"> -->
                    <div class="form-group">
                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            <input type="text" class="form-control" placeholder="Date of Report" name="reportdate" autocomplete="off">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                    </div>
                </div>
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
                                                <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                    <input type="text" class="form-control" placeholder="DD/MM/YYYY" name="from" id='from' autocomplete="off" />
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
                                                <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                    <input type="text" class="form-control" placeholder="DD/MM/YYYY" name="to" id='to' autocomplete="off" />
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
        <button class="btn  text-decoration-none">

            <?= $this->Html->link(
                __('Show Details'),
                ['controller' => 'ProjectDetails', 'action' => 'summary'],
                ['escape' => false, 'class' => 'nav-link btn btn-info mr-4 mb-sm-4']
            ) ?>
        </button>


        <button type="button" class="btn btn-info mr-4 mb-sm-4">
            <!-- <?= $this->Html->link('export', ['controller' => 'projectdetails', 'action' => 'export', '_ext' => 'csv']) ?> -->
            Save As
        </button>

        <button type="button" class="btn btn-info ml-4 mb-sm-4" id="exp" onclick="exportTableToExcel('table2excel',filename ='summary report');">Export to Excel</button>

    </div>
    <hr>
    <div>
    </div>
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" id="table2excel" class="table  table-bordered dataTable table-default br-m table-striped table-sm" role="grid" aria-describedby="dataTable_info" style="height: 100px;">
            <thead class="table-dark text-center">
                <tr>
                    <th class="align-middle" scope="col"><?= __('S/N') ?></th>
                    <th class="align-middle" scope="col"><?= __('Project Name') ?></th>
                    <th class="align-middle" scope="col"><?= __('Donor/Lender') ?></th>
                    <th class="align-middle" scope="col"><?= __('Funding Type') ?></th>
                    <th class="align-middle" scope="col"><?= __('Budget') ?></th>
                    <th class="align-middle" scope="col"><?= __('Beneficiary') ?></th>
                    <th class="align-middle" scope="col"><?= __('Achievements') ?></th>
                    <th class="align-middle" scope="col"><?= __('Next Action Plan ') ?></th>
                    <th class="align-middle" scope="col"><?= __('Status') ?></th>
                    <th class="align-middle" scope="col"><?= __('Start Date') ?></th>
                    <th class="align-middle" scope="col"><?= __('Completion Date') ?></th>
                    <th class="align-middle" scope="col"><?= __('Risk and Issues') ?></th>
                </tr>
            </thead>

            <tbody id="selected-projects">
                <?php if (isset($fromnumber)) { ?>

                    <?php $num = 1; ?>
                    <?php foreach ($projectDetails as $projectDetail) : ?>
                        <?php $startdate = h($projectDetail->start_dt); ?>
                        <?php $enddate = h($projectDetail->end_dt); ?>
                        <?php $startdatenumber = strtotime($startdate); ?>
                        <?php $enddatenumber = strtotime($enddate); ?>

                        <?php $count = 0; ?>
                        <?php $close = 0; ?>
                        <?php foreach ($milestone_list as $milestone) : ?>
                            <?php if ($milestone->project_id == $projectDetail->project_id) {
                                $count++;
                            } ?>
                            <?php if ($milestone->project_id == $projectDetail->project_id && $milestone->status_id == 3) {
                                $close++;
                            } ?>
                        <?php endforeach; ?>
                        <?php $stat = ''; ?>
                        <?php $percen = 0; ?>
                        <?php if ($count == 0) {
                            $percen = 0;
                        } else {
                            $percen = $close / $count * 100;
                        } ?>
                        <?php if ($count != 0 && ($close / $count * 100) == 100) {
                            $stat = ' <p class="mb-0" style="background-color: #000000;"> &nbsp;  </p>';
                        } else if ($count == 0 && $close == 0) {
                            $stat = ' <p class="mb-0" style="background-color: #fff"> &nbsp; </p>';
                        } else if ($count != 0 && (($close / $count * 100) >= 40) && (($close / $count * 100) < 80)) {
                            $stat = ' <p class="mb-0" style="background-color: #FFFF00"> &nbsp; </p>';
                        } else if ((($close / $count * 100) >= 80) && (($close / $count * 100) < 100)) {
                            $stat = ' <p class="mb-0" style="background-color: #1CC88A"> &nbsp; </p>';
                        } else {
                            $stat = ' <p class="mb-0" style="background-color: #FF0000"> &nbsp; </p>';
                        }
                        ?>

                        <?php if (($startdatenumber >= $fromnumber) && ($enddatenumber <= $tonumber)) : ?>
                            <tr>
                                <td style="width:5%" class="text-center"><?= h($num++) ?></td>
                                <td id="print2">
                                    <?= $this->Html->link(_($projectDetail->name), ['controller' => 'projectDetails', 'action' => 'printable', $projectDetail->id], []) ?>
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
                                <td><?= $this->Html->link(
                                        __($stat),
                                        ['controller' => 'ProjectDetails', 'action' => 'summary'],
                                        ['escape' => false, 'class' => 'nav-link collapsed']
                                    ) ?>
                                </td>
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
        <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-xlg']) ?>
        <?= $this->Modal->body() // No header
        ?>
        <?= $this->Modal->footer() // Footer with close button (default)
        ?>
        <?= $this->Modal->end() ?>
    </div>
</div>

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
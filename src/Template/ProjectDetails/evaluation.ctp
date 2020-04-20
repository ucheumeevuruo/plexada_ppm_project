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

<div class="container-fluid">
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
                <div class="dropdown-menu">
                    <!-- <a class="dropdown-item" href="#">In progress</a>
                    <a class="dropdown-item" href="#">Completed</a> -->
                    <?= $this->Html->link(
                        __(' <i class="fa fa-lg"></i> Summary'),
                        ['controller' => 'ProjectDetails', 'action' => 'summary'],
                        ['escape' => false, 'class' => 'nav-link collapsed']
                    ) ?>
                </div>
            </div>
            <div>

                <div style="display: flex; flex-direction:row; justify-content:space-around; outline: 5px solid #4E73DF; padding-left: 22px"
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
            <button type="button" class="btn btn-primary mr-4 mb-sm-4">Show Details </button>
            <button type="button" class="btn btn-primary mr-4 mb-sm-4">Customize</button>
            <button type="button" class="btn btn-primary mr-4 mb-sm-4">Save As</button>
            <button type="button" class="btn btn-primary mr-4 mb-sm-4">Printable View</button>
            <button type="button" class="btn btn-primary mr-4 mb-sm-4">Export Details</button>
        </div>
        <hr>
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" class="table table-bordered table-primary table-hover br-m"
                role="grid" aria-describedby="dataTable_info">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col" class="text-white"><?= __('S/N  ') ?></th>
                        <th scope="col" class="text-white"><?= __('Project') ?></th>
                        <th scope="col" class="text-white"><?= __('Funding') ?></th>
                        <th scope="col" class="text-white"><?= __('Donor') ?></th>
                        <th scope="col" class="text-white"><?= __('Core') ?></th>
                        <th scope="col" class="text-white"><?= __('Core') ?></th>
                        <th scope="col" class="text-white"><?= __('Start Date ') ?></th>
                        <th scope="col" class="text-white"><?= __('Completion') ?></th>
                        <th scope="col" class="text-white"><?= __('Status') ?></th>
                        <th scope="col" class="text-white"><?= __('Key') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" class="text-blue"><?= __('1') ?></th>
                        <th scope="col" class="text-blue"><?= __('Water') ?></th>
                        <th scope="col" class="text-blue"><?= __('Counterpart') ?></th>
                        <th scope="col" class="text-blue"><?= __('Three Tiers
 of ') ?></th>
                        <th scope="col" class="text-blue"><?= __('$2000 ') ?></th>
                        <th scope="col" class="text-blue"><?= __('Core Objectives') ?></th>
                        <th scope="col" class="text-blue"><?= __('Core ') ?></th>
                        <th scope="col" class="text-blue"><?= __('Sept. 2019') ?></th>
                        <th scope="col" class="text-blue"><?= __('On') ?></th>
                        <th scope="col" class="text-blue"><?= __('Key') ?></th>
                    </tr>
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
    <script>
    $(document).ready(function() {
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


</div>
<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailOld $projectDetails
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="container-fluid">

    <div class="row h-75">
        <div class="col-xs-9 col-md-8">
            <div class="card-header box-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h5 class="text-xs font-weight-bold text-primary text-uppercase mb-1">PROJECT DETAIL OVERVIEW</h5>
                    <?= $this->Html->link(
                        "<i class=\"fa fa-download fa-sm text-white-50\"></i> Generate Report</a>",
                        ['action' => 'downloadPdf', 'report.pdf'],
                        ['escape' => false, 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']
                    ) ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable" role="grid"
                            aria-describedby="dataTable_info">
                            <thead>
                                <tr>
                                    <th scope="col"><?= __('Project Id') ?></th>
                                    <th scope="col"><?= __('Project Name') ?></th>
                                    <th scope="col"><?= __('Project Duration') ?></th>
                                    <th scope="col"><?= __('Project Status') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col"><?= __('PRO_1101') ?></th>
                                    <th scope="col"><?= __('Construction of Borehole') ?></th>
                                    <th scope="col"><?= __('2 months') ?></th>
                                    <th scope="col"><?= __('Completed') ?></th>
                                </tr>
                                <tr>
                                    <th scope="col"><?= __('PRO_1102') ?></th>
                                    <th scope="col"><?= __('Building of Primary SChool') ?></th>
                                    <th scope="col"><?= __('6 months') ?></th>
                                    <th scope="col"><?= __('Completed') ?></th>
                                </tr>
                                <tr>
                                    <th scope="col"><?= __('PRO_1103') ?></th>
                                    <th scope="col"><?= __('Construction of Flyover') ?></th>
                                    <th scope="col"><?= __('12 months') ?></th>
                                    <th scope="col"><?= __('Near completions') ?></th>
                                </tr>
                                <tr>
                                    <th scope="col"><?= __('PRO_1104') ?></th>
                                    <th scope="col"><?= __('Building of ultra model ICT Center') ?></th>
                                    <th scope="col"><?= __('8 Months') ?></th>
                                    <th scope="col"><?= __('In Progress') ?></th>
                                </tr>

                            </tbody>

                        </table>
                        <h6 class="m-0 font-weight-bold text-primary">
                            <?= $this->Html->link(__('<button class="btn btn-default"><i class="fa fa-plus fa-lg"></i>&nbsp; &nbsp;Create Project</button>'), ['action' => 'add'], ['class' => 'btn btn-light overlay', 'title' => 'Add', 'escape' => false]) ?>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <!-- Search form -->
                                <form class="form-inline md-form form-sm mt0">
                                    <div class="input-group mb-0">
                                        <input type="text" class="form-control" placeholder="Search Projects"
                                            aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </h6>
                    </div>
                </div>

            </div>

        </div>


        <div class="col-xs-3 col-md-4" style="background-color:lavender;">Calender</div>
    </div>
    <div">
        <div class="card-header box-header">
            <div class="h-25">
                <div class="clearfix"></div>
                <br>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h5 class="text-xs font-weight-bold text-primary text-uppercase mb-1">ACTIVITIES</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable" role="grid"
                    aria-describedby="dataTable_info">
                    <thead>
                        <tr>
                            <th scope="col"><?= __('Activity Name') ?></th>
                            <th scope="col"><?= __('Assigned To') ?></th>
                            <th scope="col"><?= __('Duration') ?></th>
                            <th scope="col"><?= __('Start Date') ?></th>
                            <th scope="col"><?= __('Finish Date') ?></th>
                            <th scope="col"><?= __('Status') ?></th>
                            <th scope="col"><?= __('% complete') ?></th>
                            <th scope="col"><?= __('Milestone') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col"><?= __('Construction of Borehole') ?></th>
                            <th scope="col"><?= __('PRO_1101') ?></th>
                            <th scope="col"><?= __('2 months') ?></th>
                            <th scope="col"><?= __('April 4, 2020') ?></th>
                            <th scope="col"><?= __('June 4, 2020') ?></th>
                            <th scope="col"><?= __('Pending') ?></th>
                            <th scope="col"><?= __('5%') ?></th>
                            <th scope="col"><?= __('No milestone') ?></th>
                        </tr>
                        <tr>
                            <th scope="col"><?= __('Construction of Borehole') ?></th>
                            <th scope="col"><?= __('PRO_1101') ?></th>
                            <th scope="col"><?= __('2 months') ?></th>
                            <th scope="col"><?= __('April 4, 2020') ?></th>
                            <th scope="col"><?= __('June 4, 2020') ?></th>
                            <th scope="col"><?= __('Pending') ?></th>
                            <th scope="col"><?= __('5%') ?></th>
                            <th scope="col"><?= __('No milestone') ?></th>
                        </tr>
                        <tr>
                            <th scope="col"><?= __('Construction of Borehole') ?></th>
                            <th scope="col"><?= __('PRO_1101') ?></th>
                            <th scope="col"><?= __('2 months') ?></th>
                            <th scope="col"><?= __('April 4, 2020') ?></th>
                            <th scope="col"><?= __('June 4, 2020') ?></th>
                            <th scope="col"><?= __('Pending') ?></th>
                            <th scope="col"><?= __('5%') ?></th>
                            <th scope="col"><?= __('No milestone') ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
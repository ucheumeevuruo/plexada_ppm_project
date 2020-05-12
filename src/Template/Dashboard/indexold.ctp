<?php //$pieChart->printScripts(); 
?>
<!---->
<!--<script type="text/javascrpt">-->
<!--    --><?php //echo $chart->render("pieChart");
            ?>
<!--</script>-->
<?php
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="container-fluid">



    <div class="md-4 mb-5">
        <div class="card h-100 br-m">
            <div class="card-header box-header bg-primary py-2">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="text-white text-uppercase">OVERALL PORTFOLIO</h4>
                    <?= $this->Html->link("<i class=\"fa fa-download fa-sm text-white-50\"></i> Generate Report</a>", ['action' => 'downloadPdf', 'report.pdf'], ['escape' => false, 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
                    <!--                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-0">

                        <div class="row">
                            <div class="col-auto top-box px-4 py-4 top-box border-right">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= h($priority_total['count']) ?>
                                </div>
                                <div class="card-text">Projects</div>
                            </div>

                            <div class="col px-4 py-4 top-box border-right">
                                <div class="row">
                                    <div class="col-sm-6 px-0">
                                        <div class="h5 mb-0 mr-0 text-gray-800 text-reduce">High Priority</div>
                                    </div>
                                    <div class="col-sm-6 px-0">
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 50%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 20%"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 px-0">
                                        <div class="h5 mb-0 mr-0 text-gray-800 text-reduce">Medium Priority</div>
                                    </div>
                                    <div class="col-sm-6 px-0">
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 50%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 20%"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 px-0">
                                        <div class="h5 mb-0 mr-0 text-gray-800 text-reduce">Low Priority</div>
                                    </div>
                                    <div class="col-sm-6 px-0">
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 50%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 20%"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5 border-right">
                        <div class="row">
                            <div class="col-auto top-box px-3 py-4 top-box">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= h($this->NumberFormat->format($priority_total['total_budget'], ['before' => '₦'])) ?>
                                </div>
                                <div class="card-text">Total Budget</div>
                            </div>
                            <div class="col px-3 py-4 mb-0 top-box">
                                <!--            <div class="card h-100 py-2 shadow">-->
                                <!--                <div class="card-body">-->
                                <table class="table table-borderless table-box">
                                    <?php foreach ($priority['priorities'] as $sub_priority) : ?>
                                    <tr>
                                        <td><?= $sub_priority['sub_total']['priorities'] ?></td>
                                        <?php $total_percentage = @($sub_priority['sub_total']['total_consumed'] / $sub_priority['sub_total']['total_budget']) * 100; ?>
                                        <td width="70%">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: <?= $total_percentage ?>%" aria-valuenow="100"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td><?= $this->NumberFormat->format($sub_priority['sub_total']['total_budget'], ['before' => '₦']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                                <!--                </div>-->
                                <!--            </div>-->
                            </div>
                        </div>
                    </div>

                    <div class="col top-box px-4 py-4 mb-0 border-right">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= h($this->NumberFormat->format($priority_total['total_consumed'], ['before' => '₦'])) ?>
                        </div>
                        <div class="card-text">Total Consumed Budget</div>
                    </div>
                    <?php $total_percentage = $this->Number->toPercentage(($priority_total['total_consumed'] / $priority_total['total_budget']) * 100) ?>
                    <div class="col top-box px-4 py-4 mb-0">
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($total_percentage) ?></div>
                        <div class="card-text">Consumed Budget %</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->Html->script('Chart.min.js') ?>
    <?= $this->Html->script('mychart.js') ?>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h4 class="m-0 text-white">Status Overview</h4>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small status"></div>
                </div>
            </div>
        </div>
    </div>


    <?php $num = 1; ?>
    <div class="row">
        <?php foreach ($priority as $priorities) : ?>
        <?php foreach ($priorities as $title => $sub_priorities) : ?>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header box-header">
                    <h5 class="text-xs font-weight-bold text-primary text-uppercase mb-4">
                        <?= h($title . ' Priority Project'); ?></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-left mb-4">
                                <?= h($sub_priorities['sub_total']['count']); ?></div>
                            <div class="box-caption"><?= h($title . ' Priority Project'); ?></div>
                        </div>
                        <div class="col-md-6">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-right mb-4">
                                <?= h($this->NumberFormat->format($sub_priorities['sub_total']['total_budget'], ['before' => '₦'])); ?>
                            </div>
                            <div class="box-caption text-center"><?= 'Total Budget' ?></div>
                        </div>
                    </div>

                </div>
                <div class="card-body priority-box py-0">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($sub_priorities['result'] as $activity) : ?>
                        <li class="list-group-item py-0 px-0">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div id="chart-pie pt-0 pb-0">
                                        <canvas id="<?= 'myBarChart' . $num ?>"
                                            style="height: 60px; width: auto"></canvas>
                                    </div>
                                    <?php
                                                $total_percentage = 0;
                                                if (isset($activity->milestone->count) && $activity->milestone->count != 0) {
                                                    $total_percentage = (((int) $activity->milestone->count / (int) $activity->milestone->total) * 100);
                                                }
                                                ?>
                                    <?= floor($total_percentage) ?>%
                                    <script>
                                    drawChart('<?= '
                                        myBarChart ' . $num ?>', < ? = floor($total_percentage) ? > );
                                    </script>
                                    <?php $num++ ?>
                                </div>
                                <div class="col mr-2">
                                    <h4 class="small font-weight-bold">
                                        <?= $this->Html->link($activity->name, ['controller' => 'project_details', 'action' => 'view', $activity->id], ['class' => 'text-gray-600']) ?>
                                    </h4>
                                    <div class="row">
                                        <!-- Budget -->
                                        <div class="col-auto">
                                            <div
                                                class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-reduce text-right">
                                                Total Budget: </div>
                                        </div>
                                        <div class="col">
                                            <div class="h5 text-reduce text-right">
                                                <?= h($this->NumberFormat->format($activity->budget, ['before' => '₦'])) ?>
                                            </div>
                                        </div>
                                        <!-- Consumed -->
                                        <div class="col-auto">
                                            <div
                                                class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-reduce text-right">
                                                Consumed:</div>
                                        </div>
                                        <div class="col">
                                            <div class="h5 text-reduce text-right">
                                                <?= h($this->NumberFormat->format($activity->total_consumed, ['before' => '₦'])) ?>
                                            </div>
                                        </div>
                                        <?php
                                                    $total_percentage = 0;
                                                    if ($activity->budget != 0)
                                                        $total_percentage = @($activity->total_consumed / $activity->budget) * 100;
                                                    ?>
                                        <div class="col-sm-12">
                                            <?= $this->NumberFormat->progress2($total_percentage) ?>
                                        </div>

                                    </div>
                                    <?php if (isset($activity->risk_issues)) : ?>
                                    <div class="row">
                                        <div class="col-auto">
                                            <div
                                                class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-reduce text-left">
                                                Risk: </div>
                                        </div>
                                        <div class="col">
                                            <div class="h5 text-reduce text-left">
                                                <?= $activity->risk_issues->priority; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <?= $this->NumberFormat->progress($activity->risk_issues->count, $activity->risk_issues->priority) ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (isset($activity->status)) : ?>
                                    <div class="row">
                                        <div class="col-auto">
                                            <div
                                                class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-reduce text-left">
                                                Status: </div>
                                            </div>
                                        <div class="col">
                                            <div class="h5 text-reduce text-left">
                                                <?= $activity->status->status; ?>
                                                <?php if (isset($activity->status->sub_status)) : ?>
                                                &nbsp;and <?= $activity->status->sub_status ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <?= $this->NumberFormat->progress3($activity->status->status, @$activity->status->sub_status) ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>

                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>
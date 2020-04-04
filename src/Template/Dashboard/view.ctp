<?php //$pieChart->printScripts(); ?>
<!---->
<!--<script type="text/javascript">-->
<!--    --><?php //echo $chart->render("pieChart");?>
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800"><?= __('Projects Overview') ?></h2>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Projects</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalProject[0]['count'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-archive fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Budget</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->Number->currency($totalBudget[0]['budget'], 'NGN') ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-money fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">

                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Percentage Completed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->Number->toPercentage($completed[0]['completed']) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="col-xl-3 col-md-6 mb-4">-->
<!--            <div class="card border-left-danger shadow h-100 py-2">-->
<!--                <div class="card-body">-->
<!--                    <div class="row no-gutters align-items-center">-->
<!--                        <div class="col mr-2">-->
<!--                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>-->
<!--                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>-->
<!--                        </div>-->
<!--                        <div class="col-auto">-->
<!--                            <i class="fa fa-calendar fa-2x text-gray-300"></i>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
    <div class="col-xl-8 col-md-8 col-lg-7 float-left">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Spend Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
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
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-md-4 col-lg-5 float-left">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Status Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
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

    <div class="col-xl-12 col-md-12 col-lg-12 float-left">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Budget Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
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
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <?= $totalProject[0]['count'] ?>
</div>
<script>
    let expenses = <?= json_encode($expenses); ?>;
    let pieData = <?= json_encode($pieChart); ?>;
    let prices = <?= json_encode($prices); ?>;
    // let myData = [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000];
    let pieColor = ['#4e73df', '#1cc88a', '#36b9cc', '#63b7af', '#e32249', '#0f4c75'];
    $.each(pieData.label, function (index, value) {
        $('.status').html();
        $('.status').append(`<span class="mr-2">
                      <i class="fa fa-circle" style="color: ${pieColor[index]}"></i> ${value}
                    </span>`);
    })
</script>
<?= $this->Html->script('Chart.min.js') ?>
<?= $this->Html->script('chart-pie-demo.js') ?>
<?= $this->Html->script('chart-area-demo.js') ?>
<?= $this->Html->script('chart-bar-demo.js') ?>
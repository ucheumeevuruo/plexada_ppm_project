<?php //$pieChart->printScripts(); 
?>
<!---->
<?php

use Cake\ORM\Query;
use Cake\Datasource\ConnectionManager;

$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="container-fluid">

    <style>
        #container {
            overflow-y: scroll;
            overflow-x: scroll;
            /* width: 900px; */
            height: 300px;
        }

        .table-container {
            overflow-y: scroll;
            overflow-x: scroll;
            /* width: 900px; */
            height: 300px;
        }

        #container2 {
            /* position: absolute; */
            overflow-y: scroll;
            overflow-x: scroll;
            /* width: 900px; */
            height: 300px;
        }
    </style>
    <?php
    $arrcompleted = [];
    $arropen = [];
    ?>
    <?php foreach ($project_list as $project) : ?>
        <?php
        $conn = ConnectionManager::get('default');
        $prjid = $project->id;
        $completed = $conn->execute("SELECT count(*) as T FROM milestones where project_id ='" . $prjid . "' and status_id ='3' ");
        $open = $conn->execute("SELECT count(*) as S FROM milestones where project_id ='" . $prjid . "' and status_id ='1' ");
        $complete = $completed->fetch('assoc');
        $opened = $open->fetch('assoc');
        array_push($arrcompleted, $complete['T']);
        array_push($arropen, $opened['S']);

        ?>
    <?php endforeach; ?>
    <div class="md-4 mb-5">
        <div class="card h-100 br-m">
            <div class="card-header box-header bg-primary py-2">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="text-white text-uppercase">Progress Summary</h4>
                    <?= $this->Html->link("<i class=\"fa fa-download fa-sm text-white-50\"></i> Generate Report</a>", ['action' => 'downloadPdf', 'report.pdf'], ['escape' => false, 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
                    <!--                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-0 d-flex justify-content-center table-hover" style="height:300px">

                        <table class="table-sm table-responsive p-3 font-weight-bold">
                            <thead class="thead-dark">
                                <th>Projects</th>
                                <th>Percent Complete</th>
                            </thead>

                            <?php foreach ($project_list as $project) : ?>

                                <?php
                                // debug($project) ;
                                // die();
                                $sdate = $project->start_dt->format("Y-m-d H:i:s");
                                $edate = $project->end_dt->format("Y-m-d H:i:s");
                                $today = date('Y-m-d H:i:s');
                                $expectdays = 0;
                                $projectdatediff = date_diff(new DateTime($sdate), new DateTime($edate));
                                $result = intval($projectdatediff->format('%R%a'));
                                $expectedprojectdays = intval(date_diff(new DateTime($sdate), new DateTime($today))->format('%R%a'));
                                if ($expectedprojectdays > 0) {
                                    $result2 = ($expectedprojectdays * 100) / $result;
                                    $expectdays =  round(number_format($result2, 2), 2);
                                } else {
                                    $expectdays = 0;
                                }

                                // echo $expectdays;
                                // End of epected

                                // echo $freshdate = $a['completed_date'];

                                $milestones = "";
                                $milestones = $milestone_list->find('all');
                                $milestones = $milestone_list->find('all', ['conditions' => ['project_id' => $project->id, 'status_id' => '3']]);
                                // $milestones = $milestone_list->find('all')->where(['project_id =' => $project->id]);
                                // sql($milestones);
                                $prjid = $project->id;
                                $conn = ConnectionManager::get('default');
                                $stmt = $conn->execute("SELECT * FROM milestones where project_id ='" . $prjid . "' and status_id ='3' order by completed_date DESC");
                                $results = $stmt->fetchAll('assoc');
                                if (isset($results[0])) {
                                    $freshdate = $results[0]['completed_date'];
                                    $lastcloseddatediff = intval(date_diff(new DateTime($sdate), new DateTime($freshdate))->format('%R%a'));
                                    if ($lastcloseddatediff > 0) {
                                        echo $lastcloseddatediff;
                                        $result3 = ($lastcloseddatediff * 100) / $result;
                                        $completeddays =  round(number_format($result3, 2), 2);
                                    } else {
                                        $completeddays = 0;
                                    }
                                } else {
                                    $completeddays = 0;
                                }

                                // $completeddays = 0;
                                // if (isset($milestones->id)){

                                //     $milestones->order(['completed_date'=>'DESC'],Query::OVERWRITE);
                                //     $resultqry = $milestones->first();
                                //     $lastcloseddate = $resultqry->completed_date;
                                //     $lastcloseddatediff = intval(date_diff(new DateTime($sdate),new DateTime($freshdate))->format('%R%a'));
                                //     $result3 = ($lastcloseddatediff * 100)/$result;
                                //     $completeddays =  round(number_format($result3,2),2);
                                //     // echo  $lastcloseddatediff;
                                //     // sql($milestones);
                                //     // die();                                    
                                // }

                                ?>

                                <tr>
                                    <td><a href="#" class="text-decoration-none"><?= $project->name ?></a></td>
                                    <td>
                                        <table style="width:500px;" class="table table-borderless">
                                            <tr>
                                                <td class="d-flex">
                                                    <span style="width:50px;"><?= $completeddays ?>%</span>
                                                    <div class="progress" style="width:600px;">
                                                        <div class="progress-bar bg-danger progress-bar-striped active" title="overall this Project is currently <?= $completeddays ?>% complete" data-toggle="tooltip" data-placement="bottom" role="progressbar" style="width: <?= $completeddays ?>%;" aria-valuenow="<?= $completeddays ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            <tr>
                                                <td class="d-flex">
                                                    <span style="width:50px;"><?= $expectdays ?>%</span>
                                                    <div class="progress" style="width:600px;">
                                                        <div class="progress-bar bg-success progress-bar-striped active" title="This Project was planned to be <?= $expectdays ?>% completed by today" data-toggle="tooltip" data-placement="bottom" role="progressbar" style="width: <?= $expectdays ?>%;" aria-valuenow="<?= $expectdays ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            <tr>
                                            <tr>
                                        </table>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </table>



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
                    <h4 class="m-0 text-white">Health</h4>
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
                    <div class="col-md-12 mb-0 d-flex justify-content-center table-container">
                        <div class="col-md-12">
                            <table class="table p-3 table-hover font-weight-bold">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Projects</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                        <th>Tasks</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <?php foreach ($project_list as $project) : ?>

                                    <?php
                                    // debug($project) ;
                                    // die();
                                    $sdate = $project->start_dt->format("Y-m-d H:i:s");
                                    $edate = $project->end_dt->format("Y-m-d H:i:s");
                                    $today = date('Y-m-d H:i:s');

                                    $projectdatediff = date_diff(new DateTime($sdate), new DateTime($edate));
                                    $result = intval($projectdatediff->format('%R%a'));
                                    $expectedprojectdays = intval(date_diff(new DateTime($sdate), new DateTime($today))->format('%R%a'));
                                    $result2 = ($expectedprojectdays * 100) / $result;
                                    $expectdays =  round(number_format($result2, 2), 2);
                                    // echo $expectdays;
                                    // End of epected

                                    // echo $freshdate = $a['completed_date'];

                                    $milestones = "";
                                    $milestones = $milestone_list->find('all');
                                    $milestones = $milestone_list->find('all', ['conditions' => ['project_id' => $project->id, 'status_id' => '3']]);
                                    // $milestones = $milestone_list->find('all')->where(['project_id =' => $project->id]);
                                    // sql($milestones);
                                    $prjid = $project->id;
                                    $conn = ConnectionManager::get('default');
                                    $qrycount = $conn->execute("SELECT count(*) as recount FROM milestones where project_id ='" . $prjid . "' ");
                                    $mlcount = $qrycount->fetch('assoc')['recount'];
                                    $stmt = $conn->execute("SELECT * FROM milestones where project_id ='" . $prjid . "' and status_id ='3' order by completed_date DESC");
                                    $results = $stmt->fetchAll('assoc');
                                    if (isset($results[0])) {
                                        $freshdate = $results[0]['completed_date'];
                                        $lastcloseddatediff = intval(date_diff(new DateTime($sdate), new DateTime($freshdate))->format('%R%a'));
                                        if ($lastcloseddatediff > 0) {
                                            $result3 = ($lastcloseddatediff * 100) / $result;
                                            $completeddays =  round(number_format($result3, 2), 2);
                                        } else {
                                            $completeddays = 0;
                                        }
                                    } else {
                                        $completeddays = 0;
                                    }
                                    if ($expectdays > 0) {
                                        $ptocomplete = 1 - round(number_format(($completeddays / $expectdays), 2), 2);
                                    } else {
                                        $ptocomplete = 1;
                                    }

                                    $achievement = "";
                                    if ($ptocomplete == 0) {
                                        $color = "bg-success";
                                        $title = "This Project is on Schedule.";
                                        $achievement = "Total of 37 projects now completed and verified";
                                        $key = "Non";
                                    } else if ($ptocomplete > 0 && $ptocomplete <= 0.3) {
                                        $myPercent = ($ptocomplete * 100);
                                        $color = "bg-primary";
                                        $title = "This Project is $myPercent% behind schedule. To get back on track open the project page and increase tasks completion.";
                                        $achievement = "Grant disbursement to 200 FADAMA GUYS and upto 193 have already accessed the funds";
                                        $key = "Subsequent release of funds to contractors for next phase ";
                                    } else if ($ptocomplete > 0.3 && $ptocomplete <= 0.5) {

                                        $myPercent = ($ptocomplete * 100);

                                        $color = "bg-warning";

                                        $title = "This Project is $myPercent% behind schedule. To get back on track open the project page and increase tasks completion.";

                                        $achievement = "Fulfilment of conditions precedent to Disbursement as confirmed by WB";

                                        $key = "Integraton of Donor Funds into States Budget  and Safeguard Consultant yet to be appointed";
                                    } else if ($ptocomplete > 0.8 && $ptocomplete <= 1) {
                                        $myPercent = ($ptocomplete * 100);
                                        $color = "bg-danger";
                                        $title = "This Project is $myPercent% behind schedule. To get back on track open the project page and increase tasks completion.";
                                        $achievement = "Ongoing review of submitted Pre-qualification bids from contractors for LOT1,2&3by PIU";
                                        $key = "Project vehicle is required to aid logistics";
                                    }
                                    ?>

                                    <tr>
                                        <td><a href="#" class="text-decoration-none"><?= $project->name ?></a></td>
                                        <!-- <td><?= $ptocomplete ?></td> -->
                                        <td>
                                            <div class="progress " style="width:80px;">
                                                <div class="progress-bar <?= $color ?> progress-bar-striped active" title="<?= $title ?>" data-toggle="tooltip" data-placement="right" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td><?php echo $this->Form->button('<i class="fa fa-exclamation-triangle"></i>', array(
                                                'type' => 'button',
                                                'class' => 'btn btn-warning',
                                                'escape' => false,
                                                'rel' => 'tooltip',
                                                'data-placement' => 'top',
                                                'title' => $achievement
                                            )); ?></td>

                                        <td><?php echo $this->Form->button('<i class="fa fa-trophy"></i>', array(
                                                'type' => 'button',
                                                'class' => 'btn ',
                                                'escape' => false,
                                                'rel' => 'tooltip',
                                                'data-placement' => 'top',
                                                'title' => $achievement
                                            )); ?></td>
                                        <td><?= $mlcount ?> </td>
                                        <td><?= $completeddays ?>%</td>
                                    </tr>

                                <?php endforeach; ?>

                            </table>
                        </div>
                        <!-- <div class="col-md-6">
                                
                                </div> -->

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h4 class="m-0 text-white">Milestones</h4>
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
                    <div id="contain">
                        <!-- <canvas id="myPieChart"></canvas> -->
                        <canvas id="myChart" width="200" height="50" style="height:400px"></canvas>
                        <script>
                            <?php $code_array = json_encode($allprojects);
                            $comp  = json_encode($arrcompleted);
                            $op  = json_encode($arropen);
                            ?>
                            var array_code = <?php echo $code_array; ?>;
                            var array_complete = <?php echo $comp; ?>;
                            var array_open = <?php echo $op; ?>;
                            console.log(array_complete)
                            console.log(array_open)
                            doBarChart(array_code, array_complete, array_open);
                        </script>
                    </div>
                    <div class="mt-4 text-center small status"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h4 class="m-0 text-white">Cost : Budget vs Actual</h4>
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
                    <div id="container">
                        <!-- <canvas id="myPieChart"></canvas> -->
                        <canvas id="myChart2" width="200" height="50" style="height:400px"></canvas>
                        <script>
                            <?php $code_array = json_encode($allprojects) ?>
                            var array_code = <?php echo $code_array; ?>;
                            doBarChart2(array_code);
                        </script>
                    </div>
                    <div class="mt-4 text-center small status"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h4 class="m-0 text-white">Doughnut chart</h4>
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
                    <div id="container">
                        <!-- <canvas id="myPieChart"></canvas> -->
                        <canvas id="myChart3" width="200" height="50" style="height:400px"></canvas>
                        <script>
                            <?php $code_array = json_encode($allprojects) ?>
                            var array_code = <?php echo $code_array; ?>;
                            donut(array_code);
                        </script>
                    </div>
                    <div class="mt-4 text-center small status"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h4 class="m-0 text-white">Gant Chart</h4>
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

                <!-- Gantt Chart -->
                <div class="card-body">
                    <div id="container2">
                        <div id="ganttcontainer" style="height: 500px; width: 100%"></div>
                    </div>

                    <div class="mt-4 text-center small status"></div>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    $(function() {
        console.log('l');
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
</div>
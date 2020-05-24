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

<?php echo $this->Html->css('report'); ?>

<div class="container-fluid">

    <div class="card-deck">
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Summary', ['controller' => 'projects', 'action' => 'report', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Indicators', ['controller' => 'projects', 'action' => 'milestones', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Resources</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav active"
            style=" font-size: 20px;">Partners</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Risks & Issues', ['controller' => 'projects', 'action' => 'riskIssues', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;"> style=" font-size: 20px;">
            <?= $this->Html->link('Gantt Chart', ['controller' => 'dashboard', 'action' => 'ganttChart', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav"
            style=" font-size: 20px;">Documents</span>


    </div>
    <div class="card-body">

        <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?> Partners
        </h2>

        <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h4 class="m-0 text-white">Gantt Chart</h4>
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
                        <div id="container3">
                            <div id="ganttcontainer2" style="height: 500px; width: 100%">
                            <script>
                                <?php $obj_array = json_encode($ganttDetails) ?>
                                var array_code2 = <?php echo $obj_array; ?>;
                                ganttProject2(array_code2);
                                // console.log(array_code2)
                            </script>
                            </div>
                        </div>

                        <div class="mt-4 text-center small status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
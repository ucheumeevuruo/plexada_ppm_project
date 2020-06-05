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


<div class="container-fluid">
    <h2 class="text-center text-primary font-weight-bold"><?= __('Projects Summary Report') ?></h2>
    <div class="shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-primary br-t">
            <h3 class="m-0 text-white"><?= __('Executive Summary') ?>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="bootstrap-iso float-right">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-12 float-right" style="outline: 5px solid #4E73DF; margin-top: 10px;">
                                <!-- Form code begins -->
                                <h5 class="text-center text-primary pb-2 font-weight-bold"><?= __('SELECT PERIOD') ?>
                                    <form method="post" style="display: flex;">
                                        <div class="form-group">
                                            <!-- Date input -->
                                            <h6 class="font-weight-bold">From</h6>
                                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" style="background-color: #CDD8F6; border-color: #4E73DF; border-width: medium;" />
                                        </div>

                                        <div class="form-group">
                                            <!-- Date input -->
                                            <h6 class="font-weight-bold">To</h6>
                                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" style="background-color: #CDD8F6; border-color: #4E73DF; border-width: medium;" />
                                        </div>
                                    </form>
                                    <!-- Form code ends -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="" class="table table-bordered dataTable table-hover table-primary br-m" role="grid" aria-describedby="dataTable_info">
                        <thead class="text-light">
                            <tr class="bg-primary">
                                <th scope="col" class="text-white" width="15%">
                                    <?= __('Total Projects in the Period of Review') ?></th>
                                <th scope="col" class="text-white" width="15%"><?= __('Total Completed') ?></th>
                                <th scope="col" class="text-white" width="15%"><?= __('Total Projects in Progress') ?>
                                </th>
                                <th scope="col" class="text-white" width="15%">
                                    <?= __('Total Projects behind Schedule') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $allProjects = 0; ?>
                            <?php $completedProjects = 0; ?>
                            <?php $progressProjects = 0; ?>
                            <?php $behindProjects = 0; ?>

                            <?php foreach ($projectDetails as $projectDetail) : ?>
                                <?php $allProjects++; ?>
                                <?php if ($projectDetail->completed_percent == 100) {
                                    $completedProjects++;
                                } else if ($projectDetail->completed_percent == 80 || $projectDetail->completed_percent == 60) {
                                    $progressProjects++;
                                } else if ($projectDetail->completed_percent == 20) {
                                    $behindProjects++;
                                }
                                ?>

                            <?php endforeach; ?>
                            <tr>
                                <td scope="col" width="15%" id='all-project'><?= h($allProjects) ?></td>
                                <td scope="col" width="15%" id='completed-project'><?= h($completedProjects) ?></td>
                                <td scope="col" width="15%" id='project-progress'><?= h($progressProjects) ?></td>
                                <td scope="col" width="15%" id='project-behind'><?= h($behindProjects) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="shadow mb-4 br-m" style="border: 10px 20px 0 20px;">
        <h2 class="text-center text-primary font-weight-bold"><?= __('List of Projects in Review') ?></h2>
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="" class="table table-bordered dataTable table-hover table-primary br-m" role="grid" aria-describedby="dataTable_info">
                <thead class="text-light">
                    <tr class="bg-primary">

                        <th scope="col" class="text-white" style="width:5%"><?= __('S/N') ?></th>
                        <th scope="col" class="text-white" style="width:20%"><?= __('Project Name') ?></th>
                        <th scope="col" class="text-white" width="15%"><?= __('Project Status') ?></th>
                        <!-- <th scope="col" class="text-white" width="15%"><?= __('Assigned To') ?></th> -->
                        <th scope="col" class="text-white" width="15%"><?= __('% completed') ?></th>
                        <th scope="col" class="text-white" width="15%"><?= __('Start Date') ?></th>
                        <th scope="col" class="text-white" width="15%"><?= __('End Date') ?></th>
                    </tr>
                </thead>
                <tbody id="all-projects">

                    <?php $num = 0; ?>
                    <?php foreach ($projectDetails as $projectDetail) : ?>
                        <?php $count = 0; ?>
                        <?php $close = 0; ?>
                        <?php $num++; ?>
                        <?php $one = 1; ?>
                        <?php foreach ($milestones as $milestone) : ?>
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
                        } else if ($count != 0 && (($close / $count * 100) >= 40) && (($close / $count * 100) < 60)) {
                            $stat = ' <p class="mb-0" style="background-color: #FFFF00"> &nbsp; </p>';
                        } else if ($count != 0 && (($close / $count * 100) >= 60) && (($close / $count * 100) < 80)) {
                            $stat = ' <p class="mb-0" style="background-color: #FFFF00"> &nbsp; </p>';
                        } else if ((($close / $count * 100) >= 80) && (($close / $count * 100) < 100)) {
                            $stat = ' <p class="mb-0" style="background-color: #1CC88A"> &nbsp; </p>';
                        } else {
                            $stat = ' <p class="mb-0" style="background-color: #FF0000"> &nbsp; </p>';
                        }
                        ?>

                        <tr>
                            <td style="width:5%"><?= h($num) ?></td>
                            <td><?= h($projectDetail->name) ?></td>
                            <td><?= $this->Html->link(
                                    __($stat),
                                    ['controller' => 'ProjectDetails', 'action' => 'summary'],
                                    ['escape' => false, 'class' => 'nav-link collapsed']
                                ) ?>
                            </td>
                            <td><?= h($percen) ?>%</td>
                            <td><?= h($projectDetail->start_dt) ?></td>
                            <td><?= h($projectDetail->end_dt) ?></td>

                        </tr>

                    <?php endforeach; ?>
                </tbody>
                <!-- completed projects -->
                <tbody style="display:none" id="completed-projects">

                    <?php $num = 0; ?>
                    <?php foreach ($projectDetails as $projectDetail) : ?>
                        <?php if ($projectDetail->completed_percent == 100) : ?>
                            <?php $num++; ?>
                            <tr>
                                <td style="width:5%"><?= h($num) ?></td>
                                <td><?= h($projectDetail->name) ?></td>
                                <td><?= $this->Html->link(
                                        __(' <p class="mb-0" style="background-color: #00FF00;"> &nbsp;  </p>'),
                                        ['controller' => 'ProjectDetails', 'action' => 'summary'],
                                        ['escape' => false, 'class' => 'nav-link collapsed']
                                    ) ?>
                                </td>
                                <td><?= h($projectDetail->sponsor) ?></td>
                                <td><?= h($projectDetail->completed_percent) ?></td>
                                <td><?= h($projectDetail->start_dt) ?></td>
                                <td><?= h($projectDetail->end_dt) ?></td>

                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
                <!-- Projects in Progress -->
                <tbody style="display:none" id="projects-progress">

                    <?php $num = 0; ?>
                    <?php foreach ($projectDetails as $projectDetail) : ?>
                        <?php if ($projectDetail->completed_percent == 80 || $projectDetail->completed_percent == 60) : ?>
                            <?php $num++; ?>
                            <?php if ($projectDetail->completed_percent == 100) {
                                $stat = ' <p class="mb-0" style="background-color: #00FF00;"> &nbsp;  </p>';
                            } else if ($projectDetail->completed_percent == 80) {
                                $stat = ' <p class="mb-0" style="background-color: #FFFF00"> &nbsp; </p>';
                            } else if ($projectDetail->completed_percent == 60) {
                                $stat = ' <p class="mb-0" style="background-color: #FFBF00"> &nbsp; </p>';
                            } else {
                                $stat = ' <p class="mb-0" style="background-color: #FF0000"> &nbsp; </p>';
                            }
                            ?>
                            <tr>
                                <td style="width:5%"><?= h($num) ?></td>
                                <td><?= h($projectDetail->name) ?></td>
                                <td><?= $this->Html->link(
                                        __($stat),
                                        ['controller' => 'ProjectDetails', 'action' => 'summary'],
                                        ['escape' => false, 'class' => 'nav-link collapsed']
                                    ) ?>
                                </td>
                                <td><?= h($projectDetail->sponsor) ?></td>
                                <td><?= h($projectDetail->completed_percent) ?></td>
                                <td><?= h($projectDetail->start_dt) ?></td>
                                <td><?= h($projectDetail->end_dt) ?></td>

                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
                <!-- Projects behind schedule -->
                <tbody style="display:none" id="projects-behind">

                    <?php $num = 0; ?>
                    <?php foreach ($projectDetails as $projectDetail) : ?>
                        <?php if ($projectDetail->completed_percent == 20) : ?>
                            <?php $num++; ?>

                            <tr>
                                <td style="width:5%"><?= h($num) ?></td>
                                <td><?= h($projectDetail->name) ?></td>
                                <td><?= $this->Html->link(
                                        __(' <p class="mb-0" style="background-color: #FF0000;"> &nbsp;  </p>'),
                                        ['controller' => 'ProjectDetails', 'action' => 'summary'],
                                        ['escape' => false, 'class' => 'nav-link collapsed']
                                    ) ?>
                                </td>
                                <td><?= h($projectDetail->sponsor) ?></td>
                                <td><?= h($projectDetail->completed_percent) ?></td>
                                <td><?= h($projectDetail->start_dt) ?></td>
                                <td><?= h($projectDetail->end_dt) ?></td>

                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
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

        $("#all-project").click(function() {
            $("#all-projects").show();
            $("#completed-projects").hide();
            $("#projects-progress").hide();
            $("#projects-behind").hide();
        });

        $("#completed-project").click(function() {
            $("#completed-projects").show();
            $("#all-projects").hide();
            $("#projects-progress").hide();
            $("#projects-behind").hide();
        });

        $("#project-progress").click(function() {
            $("#projects-progress").show();
            $("#all-projects").hide();
            $("#completed-projects").hide();
            $("#projects-behind").hide();
        });

        $("#project-behind").click(function() {
            $("#projects-behind").show();
            $("#all-projects").hide();
            $("#completed-projects").hide();
            $("#projects-progress").hide();
        });
    });
</script>
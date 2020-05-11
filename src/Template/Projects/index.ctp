<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */

use Cake\ORM\Query;
use Cake\Datasource\ConnectionManager;

$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<style>
.container{
    background: none repeat scroll 0 0 #000;
    height: 100px;
    padding: 10px;
    width: 40px;}
.red, .yellow, .green{border-radius: 100%;
    height: 25px;
    margin-top: 3px;
    padding: 2px;
    width: 25px;}
.red{background: red;}
.yellow{background: yellow;}
.green{background: green;}
</style>
<div class="container-fluid">
    <h2 class="text-center text-primary font-weight-bold"><?= __('Projects') ?></h2>
    <div class="shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-primary br-t">
            <h3 class="m-0 text-white"><?= __('Project') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>
                </div>
            </h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0"
                    class="table table-bordered dataTable table-hover table-primary br-m" role="grid"
                    aria-describedby="dataTable_info">
                    <thead class="bg-primary br-t">
                        <tr>
                            <th scope="col" width="13%"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Brief') ?></th>
                            <th scope="col" width="15%"><?= __('Status') ?></th>
                            <th scope="col" width="15%"><?= __('Waiting On') ?></th>
                            <th scope="col" width="15%"><?= __('Amount Approved') ?></th>
                            <th scope="col" class="actions" width="22%"><?= __('Actions') ?></th>
                            <th scope="col" width="15%"><?= __('Project Duration') ?></th>
                            <th scope="col" width="15%"><?= __('Status') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project) :
                            $color = "";
                            $status = 0;
                            $status = $project->percent;

                            if ($status == 0) {
                                $color = "bg-light";
                                $title = "Project is about to kick off";
                            } else if ($status > 0 && $status < 50) {
                                $color = "bg-warning";
                                $title = "Project is active but with limited concerns, needs close monitoring !!!";
                            } else if ($status == 50) {
                                $color = "bg-primary";
                                $title = "Project is on hold !";
                            } else if ($status > 50 && $status < 70) {
                                $color = "bg-danger";
                                $title = "Project is active but with major concerns, needs corrective action !!!";
                            } else if ($status > 70 && $status < 100) {
                                $color = "bg-success";
                                $title = "Project is active and On-Track";
                            } else if ($status == 100) {
                                $color = "bg-dark";
                                $title = "Project Completed";
                            } else {
                                $color = "bg-info";
                                $title = "";
                            }
                            // echo $status;
                        ?>

                        <tr>
                            <!-- <td><?= $this->Number->format($project->id) ?></td> -->
                            <td><?= $this->Html->link($project->name, ['controller' => 'projects', 'action' => 'report', $project->id], ['id' => 'transmit']) ?>
                            </td>
                            <td><?= h($project->introduction) ?></td>
                            <!-- <td><?= h($project->percent) ?></td> -->
                            <td>
                                <div class="progress " style="width:110px; height: 40px">
                                    <div class="progress-bar <?= $color ?> progress-bar-striped active"
                                        title="<?= $title ?>" data-toggle="tooltip" data-placement="right"
                                        role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </td>
                            <!-- <td><?= h($project->waiting_on) ?></td> -->
                            <td>Umeevuruo Uche</td>
                            <td><?= $this->Number->currency($project->cost) ?></td>
                            <td class="actions">
                                <button class="btn btn-small btn-dark">
                                    <?php
                                        $prjid = $project->id;
                                        // echo $prjid;
                                        $conn = ConnectionManager::get('default');
                                        $qrycount = $conn->execute("SELECT * FROM project_details where project_id ='" . $prjid . "' ");
                                        $results = $qrycount->fetchAll('assoc');
                                        if (isset($results[0])) {
                                            echo '<a  class="text-success txt-sm">Add PAD</a>';
                                        } else {
                                            echo $this->Html->link(__('Add PAD'), ['controller' => 'projectDetails', 'action' => 'add', $project->id], ['class' => 'text-light txt-sm']);
                                        }
                                        ?>
                                </button>
                                <button class="btn btn-small btn-dark">
                                    <?php
                                        $prjid = $project->id;
                                        // echo $prjid;
                                        $conn = ConnectionManager::get('default');
                                        $qrycount = $conn->execute("SELECT * FROM pims where project_id ='" . $prjid . "' ");
                                        $resultspim = $qrycount->fetchAll('assoc');
                                        if (isset($resultspim[0])) {
                                            echo '<a  class="text-success txt-sm">Add PIM</a>';
                                        } else {
                                            echo $this->Html->link(__('Add PIM'), ['controller' => 'pims', 'action' => 'add', $project->id], ['class' => 'text-light txt-sm']);
                                        }
                                        ?>
                                </button>
                                <button class="btn btn-small btn-dark">
                                    <?php
                                        $prjid = $project->id;
                                        // echo $prjid;
                                        $conn = ConnectionManager::get('default');
                                        $qrycount = $conn->execute("SELECT * FROM project_fundings where project_id ='" . $prjid . "' ");
                                        $resultsppf = $qrycount->fetchAll('assoc');
                                        if (isset($resultsppf[0])) {
                                            // echo '<a  class="text-success txt-sm">Add PPF</a>';
                                            echo $this->Html->link(__('Add PPA'), ['controller' => 'projectFundings', 'action' => 'add', $project->id], ['class' => 'text-light txt-sm overlay']);
                                        } else {
                                            echo $this->Html->link(__('Add PPA'), ['controller' => 'projectFundings', 'action' => 'add', $project->id], ['class' => 'text-light txt-sm overlay']);
                                        }
                                        ?>
                                </button>
                            </td>
                            <td class="actions">
                                    <?php
                                        $prjid = $project->id;
                                        // echo $prjid;
                                        $conn = ConnectionManager::get('default');
                                        $qrycount = $conn->execute("SELECT * FROM project_details where project_id ='" . $prjid . "' ");
                                        $results = $qrycount->fetchAll('assoc');
                                        $to =" to ";
                                        if (isset($results[0])) {
                                            echo(date_format(new DateTime($results[0]['start_dt']),"d F, Y") . $to . date_format(new DateTime($results[0]['end_dt']),"d F, Y") );
                                        }
                                        ?>
                            </td>
                            <td>
                            <div class="container">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                            </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <div class="paginator">
        <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->


<!-- MODAL ELEMENTS -->

<div id="dialogModal" class="bg-primary">
    <!-- the external content is loaded inside this tag -->
    <div id="contentWrap">
        <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-lg']) ?>
        <?= $this->Modal->body()// No header ?>
        <?= $this->Modal->footer()// Footer with close button (default) ?>
        <?= $this->Modal->end() ?>
    </div>
</div>

    <script>
   $(document).ready(function() {
            //respond to click event on anything with 'overlay' class
            $(".overlay").click(function(event){
                event.preventDefault();
                //load content from href of link
                $('#contentWrap .modal-body').load($(this).attr("href"), function(){
                    $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content').removeClass()
                    $('#MyModal4').modal('show')
                });
            });
        });

        $('.dataTable').DataTable();
    </script>
</div>

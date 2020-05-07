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
                            <!-- <th scope="col" width="15%"><?= __('Id')  ?></th> -->
                            <th scope="col" width="13%"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Brief') ?></th>
                            <th scope="col"width="15%"><?= __('Status') ?></th>
                            <th scope="col"width="15%"><?= __('Waiting On') ?></th>
                            <th scope="col" width="15%"><?= __('Cost') ?></th>
                            <th scope="col" class="actions" width="22%"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project):
                        $color="";
                        $status=0;
                        $status = $project->percent;

                        if ($status == 0){
                            $color = "bg-light";
                            $title ="Project is about to kick off";
                        }else if ($status > 0 && $status < 50){
                            $color = "bg-warning";
                            $title ="Project is active but with limited concerns, needs close monitoring !!!";
                        }else if ($status == 50){
                            $color = "bg-primary";
                            $title ="Project is on hold !";
                        }else if ($status > 50 && $status < 70){
                            $color = "bg-danger";
                            $title ="Project is active but with major concerns, needs corrective action !!!";
                        }else if ($status > 70 && $status < 100){
                            $color = "bg-success";
                            $title ="Project is active and On-Track";
                        }else if ($status == 100){
                            $color = "bg-dark";
                            $title ="Project Completed";
                        }else{
                            $color = "bg-info";
                            $title ="";
                        }
                        // echo $status;
                        ?>

                        <tr>
                            <!-- <td><?= $this->Number->format($project->id) ?></td> -->
                            <td><?= $this->Html->link($project->name, ['controller' => 'projects', 'action' => 'view', $project->id], ['id' => 'transmit']) ?>
                            </td>
                            <td><?= h($project->introduction) ?></td>
                            <!-- <td><?= h($project->percent) ?></td> -->
                            <td>
                                <div class="progress " style="width:110px; height: 40px">
                                    <div class="progress-bar <?= $color ?> progress-bar-striped active" title="<?= $title ?>" data-toggle="tooltip" data-placement="right" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
                                            echo $this->Html->link(__('Add PPA'), ['controller' => 'projectFundings', 'action' => 'add', $project->id], ['class' => 'text-light txt-sm']);
                                        } else {
                                            echo $this->Html->link(__('Add PPA'), ['controller' => 'projectFundings', 'action' => 'add', $project->id], ['class' => 'text-light txt-sm']);
                                        }
                                        ?>
                                </button>
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

<script>
 $('.dataTable').DataTable();

    $(function() {
        console.log('l');
        $('[data-toggle="tooltip"]').tooltip()
    });


 </script>
</div>

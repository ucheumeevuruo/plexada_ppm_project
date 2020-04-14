<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailOld[]|\Cake\Collection\CollectionInterface $projectDetails
 * @var \App\Model\Entity\Activity[] $activities
 * @var \App\Model\Entity\Role $roles
 * @var \App\Model\Entity\Sponsor[] $sponsors
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
                <div class="d-sm-flex align-items-center justify-content-between mb-2">
                    <h5 class="text-center text-primary pb-2 font-weight-bold"><?= __('PROJECT DETAIL OVERVIEW') ?>
                    </h5>

                    <!-- <h5 class="font-weight-bold text-primary text-uppercase mb-1">PROJECT DETAIL OVERVIEW</h5> -->
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
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" class="text-white"><?= __('Project ') ?></th>
                                    <th scope="col" class="text-white"><?= __('Project Details') ?></th>
                                    <th scope="col" class="text-white"><?= __('Project Duration') ?></th>
                                    <th scope="col" class="text-white"><?= __('Project Status') ?></th>
                                    <th scope="col" class="text-white"><?= __('Tasks') ?></th>
                                    <th scope="col" class="text-white"><?= __('Project Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($projectDetails as $projectDetail) : ?>
                                <tr>
                                    <td><?= $this->Html->link($projectDetail->name, ['controller' => 'ProjectDetails', 'action' => 'view', $projectDetail->id]) ?>
                                    </td>
                                    <td><?= $this->Text->truncate(h($projectDetail->description), 66) ?></td>
                                    </td>

                                    <td><?= $projectDetail->has('price') ? h($this->NumberFormat->format($projectDetail->price->budget, ['before' => '₦'])) : '&#8358;0' ?>
                                    </td>
                                    <!-- <td><?= h(($projectDetail->start_dt) - ($projectDetail->end_dt)) ?></td> -->
                                    <td><?= h($projectDetail->end_dt) ?></td>
                                    <td>
                                        <?= $this->Html->link(__('<i class="fa fa-list-alt fa-lg"></i> &nbsp;'), ['controller' => 'tasks', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
                                        <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i> &nbsp;'), ['controller' => 'tasks', 'action' => 'add'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
                                    </td>
                                    <td class="actions">
                                        <?php if (!$projectDetail->has('annotation')) : ?>
                                        <?= $this->Html->link(__('<i class="fa fa-list-alt fa-sm"></i>'), ['controller' => 'annotations', 'action' => 'add', $projectDetail->id], ['escape' => false, 'class' => 'btn btn-outline-warning btn-sm overlay']) ?>
                                        <?php else : ?>
                                        <?= $this->Html->link(__('<i class="fa fa-list-alt fa-sm"></i>'), ['controller' => 'annotations', 'action' => 'edit', $projectDetail->annotation->id], ['escape' => false, 'class' => 'btn btn-outline-warning btn-sm overlay']) ?>
                                        <?php endif ?>
                                        <?= $this->Form->postLink(__("<i class='fa fa-trash-o fa-lg'></i>"), ['action' => 'delete', $projectDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetail->id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                        <h6 class="m-0 font-weight-bold text-primary">
                            <?= $this->Html->link(__('<button class="btn btn-primary"><i class="fa fa-plus fa-lg"></i>&nbsp; &nbsp;Create Project</button>'), ['action' => 'add'], ['class' => 'btn btn-light overlay', 'title' => 'Add', 'escape' => false]) ?>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <!-- Search form -->
                                <!-- <form class="form-inline md-form form-sm mt0">
                                    <div class="input-group mb-0">
                                        <input type="text" class="form-control" placeholder="Search Projects"
                                            aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </form> -->
                                <!-- <div class="paginator">
                                    <ul class="pagination">
                                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                        <?= $this->Paginator->numbers() ?>
                                        <?= $this->Paginator->next(__('next') . ' >') ?>
                                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                                    </ul>

                                </div> -->
                            </div>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-3 col-md-4">
            <?php echo $this->Html->image('calendar.png', array('alt' => 'CakePHP', 'border' => '0', 'data-src' => 'calendar.png/100%x100'), ['fullBase' => true]); ?>
        </div>
    </div>

    <div class="container-fluid">

        <h2 class="text-left text-primary pb-2 font-weight-bold"><?= __('Tasks') ?></h2>
        <div class="shadow mb-4 br-m">
            <div class="py-3 bg-primary br-t">

                <h3 class="m-0 text-white pl-3"><?= __('Add') ?>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['controller' => 'tasks', 'action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>
                    </div>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0"
                        class="table table-bordered dataTable table-primary table-hover br-m" role="grid"
                        aria-describedby="dataTable_info">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" class="text-white"><?= __('Task Name') ?></th>
                                <th scope="col" class="text-white"><?= __('Start Date') ?></th>
                                <th scope="col" class="text-white"><?= __('Description') ?></th>
                                <th scope="col" class="text-white"><?= __('Predecessor') ?></th>
                                <th scope="col" class="text-white"><?= __('Successor') ?></th>
                                <th scope="col" class="text-white"><?= __('Activities') ?></th>
                                <th scope="col" class="text-white"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tasks as $task) : ?>
                            <tr>
                                <td><?= h($task->Task_name) ?></td>
                                <td><?= h($task->Start_date) ?></td>
                                <td><?= h($task->Description) ?></td>
                                <td><?= h($task->Predecessor) ?></td>
                                <td><?= h($task->Successor) ?></td>
                                <td>
                                    <?= $this->Html->link(__('<i class="fa fa-list-alt fa-lg"></i> &nbsp;'), ['controller' => 'activities', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-pencil fa-lg"></i>'), ['action' => 'edit', $task->Task_name], ['class' => 'btn btn-outline-warning btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>

                                    <?= $this->Form->postLink(__("<i class='fa fa-trash-o fa-lg'></i>"), ['action' => 'delete', $task->Task_name], ['confirm' => __('Are you sure you want to delete # {0}?', $task->Task_name), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container-fluid">
            <h2 class="text-left text-primary pb-2 font-weight-bold"><?= __('Activities') ?></h2>
            <div class="shadow mb-4 br-m">
                <div class="py-3 bg-primary br-t">

                    <h3 class="m-0 text-white pl-3"><?= __('Add') ?>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>
                        </div>
                    </h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable" role="grid"
                            aria-describedby="dataTable_info">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" class="text-white"><?= __('Activity Name') ?></th>
                                    <th scope="col" class="text-white"><?= __('Assigned To') ?></th>
                                    <th scope="col" class="text-white"><?= __('Duration') ?></th>
                                    <th scope="col" class="text-white"><?= __('Start Date') ?></th>
                                    <th scope="col" class="text-white"><?= __('Finish Date') ?></th>
                                    <th scope="col" class="text-white"><?= __('Status') ?></th>
                                    <th scope="col" class="text-white"><?= __('% complete') ?></th>
                                    <th scope="col" class="text-white"><?= __('Milestone') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col"><?= __('Clear the land') ?></td>
                                    <td scope="col"><?= __('AY holding') ?></td>
                                    <td scope="col"><?= __('2 months') ?></td>
                                    <td scope="col"><?= __('April 4, 2020') ?></td>
                                    <td scope="col"><?= __('June 4, 2020') ?></td>
                                    <td scope="col"><?= __('Pending') ?></td>
                                    <td scope="col"><?= __('5%') ?></td>
                                    <td scope="col"><?= __('No milestone') ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div id="dialogModal">
                <!-- the external content is loaded inside this tag -->
                <div id="contentrap">
                    <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-lg']) ?>
                    <?= $this->Modal->body() // No header 
                    ?>
                    <?= $this->Modal->footer() // Footer with close button (default) 
                    ?>
                    <?= $this->Modal->end() ?>
                </div>
            </div>

            <script>
            $(".overlay").click(function(event) {
                event.preventDefault();
                //load content from href of link
                $('#contentWrap .modal-body').load($(this).attr("href"), function() {
                    $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content')
                        .removeClass()
                    $('#MyModal4').modal('show')
                });
            });
            $(document).ready(function() {
                $('.dataTable').DataTable();
            });
            </script>
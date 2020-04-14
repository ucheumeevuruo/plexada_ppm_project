<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailOld[]|\Cake\Collection\CollectionInterface $projectDetails
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
                <div class="d-sm-flex align-items-center justify-content-between mb-2 bg-primary">
                    <h5 class="text-white text-uppercase mb-1 p-3">PROJECT DETAIL OVERVIEW</h5>
                    <?= $this->Html->link(
                        "<i class=\"fa fa-download fa-sm text-white-50\"></i> Generate Report</a>",
                        ['action' => 'downloadPdf', 'report.pdf'],
                        ['escape' => false, 'class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']
                    ) ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" class="table table-bordered table-primary table-hover br-m" role="grid"
                            aria-describedby="dataTable_info">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" class="text-white"><?= __('Project ') ?></th>
                                    <th scope="col" class="text-white"><?= __('Project Details') ?></th>
                                    <th scope="col" class="text-white"><?= __('Project Duration') ?></th>
                                    <th scope="col" class="text-white"><?= __('Project Status') ?></th>
                                    <th scope="col" class="text-white"><?= __('Project Actions') ?></th>
                                </tr>
                            </thead>
                            <!-- <tbody>
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

                            </tbody> -->
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


        <div class="col-xs-3 col-md-4">
            <?php echo $this->Html->image('calendar.png', array('alt' => 'CakePHP', 'border' => '0', 'data-src' => 'calendar.png/100%x100'), ['fullBase' => true]); ?>
        </div>
    </div>
    <div">
        <div class="card-header box-header">
            <div class="h-25">
                <div class="clearfix"></div>
                <br>
                <div class="d-sm-flex align-items-center justify-content-between ">
                    <h5 class=" font-weight-bold text-primary text-uppercase mb-1">ACTIVITIES</h5>
                    <h6 class="m-0 font-weight-bold text-primary">
                        <?= $this->Html->link(__('<button class="btn btn-primary"><i class="fa fa-plus fa-lg"></i>&nbsp; &nbsp;Create Activity</button>'), ['action' => 'add'], ['class' => 'btn btn-light overlay', 'title' => 'Add', 'escape' => false]) ?>
                        <?= $this->Html->link(__('<button class="btn btn-primary"><i class="fa fa-plus fa-lg"></i>&nbsp; &nbsp;Create Task</button>'), ['action' => 'add'], ['class' => 'btn btn-light overlay', 'title' => 'Add', 'escape' => false]) ?>
                </div>

            </div>
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
            <div class="h-25">
                <div class="clearfix"></div>
                <br>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h5 class="font-weight-bold text-primary text-uppercase mb-1">TASKS</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable" role="grid"
                    aria-describedby="dataTable_info">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col" class="text-white"><?= __('Task Name') ?></th>
                            <th scope="col" class="text-white"><?= __('Task Date') ?></th>
                            <th scope="col" class="text-white"><?= __('Description') ?></th>
                            <th scope="col" class="text-white"><?= __('Predecessor') ?></th>
                            <th scope="col" class="text-white"><?= __('Successor') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col"><?= __('Construction of Borehole') ?></th>
                            <th scope="col"><?= __('April 4, 2020') ?></th>
                            <th scope="col"><?= __('The dredged Lower River Niger being the largest river in Africa') ?>
                            </th>
                            <th scope="col"><?= __('Last Administration') ?></th>
                            <th scope="col"><?= __('His Excellency') ?></th>

                        </tr>
                        <tr>
                            <th scope="col"><?= __('Construction of Borehole') ?></th>
                            <th scope="col"><?= __('April 4, 2020') ?></th>
                            <th scope="col"><?= __('The dredged Lower River Niger being the largest river in Africa') ?>
                            </th>
                            <th scope="col"><?= __('Last Administration') ?></th>
                            <th scope="col"><?= __('His Excellency') ?></th>

                        </tr>
                        <tr>
                            <th scope="col"><?= __('Construction of Borehole') ?></th>
                            <th scope="col"><?= __('April 4, 2020') ?></th>
                            <th scope="col"><?= __('The dredged Lower River Niger being the largest river in Africa') ?>
                            </th>
                            <th scope="col"><?= __('Last Administration') ?></th>
                            <th scope="col"><?= __('His Excellency') ?></th>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

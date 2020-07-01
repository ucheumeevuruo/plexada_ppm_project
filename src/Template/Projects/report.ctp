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

<style>
    .drilldown {
        max-height: 100px;
        overflow-y: scroll;
    }

    /* Grow */
    .hvr-grow {
        display: inline-block;
        vertical-align: middle;
        transform: translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        backface-visibility: hidden;
        -moz-osx-font-smoothing: grayscale;
        transition-duration: 0.3s;
        transition-property: transform;
    }

    .hvr-grow:hover,
    .hvr-grow:focus,
    .hvr-grow:active {
        transform: scale(1.1);
    }
</style>

<?php
echo $this->element('projectcrumb/default');
?>
<!-- <?= $this->Html->link(__('Projects'), ['action' => 'preImplementation']) ?> -->
<li class="breadcrumb-item active" aria-current="page">Summary</li>
</ol>
</nav>
<!-- ./end Breadcrumb -->

<!-- Navigation area -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <?= $this->Html->link('Summary', ['action' => 'report', $project->id], ['id' => 'transmit', 'class' => 'nav-link active']) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link('Indicators', ['controller' => 'projects', 'action' => 'milestones', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link('Disbursement', ['controller' => 'projects', 'action' => 'disburse', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link('Gantt Chart', ['controller' => 'projects', 'action' => 'gantt_chart', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link('Documents', ['controller' => 'projects', 'action' => 'documents', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link('Health', ['action' => 'startedTask', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
    </li>
</ul>
<!-- ./end Navigation area -->


<!-- Menu area [Search, pagination] -->
<!-- I was supposed to put this section in the element template but will do that soon. -->
<nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
    <a class="navbar-brand" href="#">Summary</a>
</nav>
<h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?>
</h2>
</div>
<div class="row m-3">
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0 border border-left-<?= $colorCode ?> rounded-lg">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Project Brief') ?>
                        </div>
                        <div class="h6 mb-0 text-gray-800"><?= h($project->name) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Objectives') ?>
                        </div>
                        <div class="h6 mb-0 text-gray-800"><?= h($project->introduction) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Sponsors') ?>
                        </div>
                        <div class="h6 mb-0 text-gray-800">
                            <div class="mb-1">
                                Name: <?= $project->has('project_sponsor') ? $project->project_sponsor->sponsor->full_name : '' ?>
                            </div>
                            <div class="mb-1 text-gray-800">
                                Contact Person: <?= $project->has('project_sponsor') ? $project->project_sponsor->sponsor->other_names : '' ?>
                            </div>
                            <div class="mb-1 text-gray-800">
                                Contact Phone: <?= $project->has('project_sponsor') ? $project->project_sponsor->sponsor->phone_no : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Donors') ?>
                        </div>
                        <div class="h6 mb-0 text-gray-800">
                            Name: <?= $project->has('project_donor') ? $project->project_donor->sponsor->full_name : '' ?>
                        </div>
                        <div class="mb-1 text-gray-800">
                            Contact Person: <?= $project->has('project_donor') ? $project->project_donor->sponsor->other_names : '' ?>
                        </div>
                        <div class="mb-1 text-gray-800">
                            Contact Phone: <?= $project->has('project_donor') ? $project->project_donor->sponsor->phone_no : '' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Budget and Expense') ?>
                        </div>
                        <div class="h6 mb-1 text-gray-800">Currency :
                            <?= $project->project_detail->has('currency') ? $project->project_detail->currency->code : '' ?>
                        </div>
                        <div class="h6 mb-1 text-gray-800">Budget :
                            <?= $this->Number->format($project->project_detail->budget, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?>
                        </div>
                        <div class="h6 mb-1 text-gray-800">Annual Disbursement :
                            <?= $this->Number->format($project->project_detail->expenses, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('MDA') ?>
                        </div>
                        <div class="h6 mb-0 text-gray-800 ">
                            <?= $project->has('project_mda') ? $project->project_mda->sponsor->full_name : '' ?>
                        </div>
                        <div class="mb-1 text-gray-800">
                            Contact Person: <?= $project->has('project_donor') ? $project->project_donor->sponsor->other_names : '' ?>
                        </div>
                        <div class="mb-1 text-gray-800">
                            Contact Phone: <?= $project->has('project_donor') ? $project->project_donor->sponsor->phone_no : '' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2" id="" data-attr="">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Completed Indicators') ?>
                        </div>
                        <div class="h6 mb-0 text-gray-800 drilldown">
                            <?php foreach ($project->milestones as $milestones) : ?>
                                <?php if ($milestones->status_id == 3) : ?>
                                    <p class="card-text text-gray-800">
                                        <?= $this->Html->link($milestones->description, ['controller' => 'milestones', 'action' => 'view', $milestones->id], ['class' => 'nav-col text-gray-800']) ?>
                                    </p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Risks & Issues') ?>
                        </div>
                        <div class="h6 mb-0 text-gray-800">
                            <?= h($project->project_detail->risk_and_issues) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Project Duration') ?>
                        </div>
                        <div class="h6 mb-1 text-gray-800">Start date :
                            <?= h($project->project_detail->start_dt) ?></div>
                        <div class="h6 mb-1 text-gray-800">End date :
                            <?= h($project->project_detail->end_dt) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 hvr-grow">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Project Manager') ?>
                        </div>
                        <div class="h6 mb-0 text-gray-800">
                            <div class="mb-1">

                                Name: <?= $project->has('project_manager') ? $project->project_manager->manager->full_name : '' ?>
                            </div>
                            <div class="mb-1 text-gray-800">
                                Contact Person: <?= $project->has('project_manager') ? $project->project_manager->sponsor->other_names : '' ?>
                            </div>
                            <div class="mb-1 text-gray-800">
                                Contact Phone: <?= $project->has('project_manager') ? $project->project_manager->sponsor->phone_no : '' ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
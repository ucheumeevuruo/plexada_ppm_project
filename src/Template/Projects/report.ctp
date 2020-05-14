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


<div class="container-fluid  mt-4">

    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'index'])?>
            </li>
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
            <?= $this->Html->link('Resources', [], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Partners', ['controller' => 'projectDetails', 'action' => 'partners', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Gantt Charts', ['controller' => 'projects','action' => 'gantt_chart', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Documents', ['controller' => 'projects', 'action' => 'documents', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
    </ul>
    <!-- ./end Navigation area -->

    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Summary</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?>
    </h2>
</div>
<?php if ($project->project_detail->sponsor_id == 1) {
        $sponsor = 'World Bank';
    } elseif ($project->project_detail->sponsor_id == 3) {
        $sponsor = 'CBN';
    } elseif ($project->project_detail->sponsor_id == 4) {
        $sponsor = 'IMF';
    } elseif ($project->project_detail->sponsor_id == 5) {
        $sponsor = 'Ministry of Agriculture';
    } elseif ($project->project_detail->sponsor_id == 6) {
        $sponsor = 'Ministry of Health';
    } else {
        $sponsor = 'His Excellency';
    }
    ?>

<div class="row m-3">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2" id="clickable-card" data-attr="">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Project Brief') ?>
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= h($project->name) ?></div>
                    </div>
                </div>

            </div>
            <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-clock fa-1x text-gray-300"></i>
                    </div>
                    <div class="col border-left ">
                        <i class="fas fa-book fa-1x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2" id="clickable-card" data-attr="">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Objectives') ?>
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= h($project->introduction) ?></div>
                    </div>
                </div>
            </div>
            <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-clock fa-1x text-gray-300"></i>
                    </div>
                    <div class="col border-left ">
                        <i class="fas fa-book fa-1x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2" id="clickable-card" data-attr="">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Sponsors & Donors') ?>
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= h($sponsor) ?></div>
                    </div>
                </div>
            </div>
            <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-clock fa-1x text-gray-300"></i>
                    </div>
                    <div class="col border-left ">
                        <i class="fas fa-book fa-1x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2" id="clickable-card" data-attr="">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('Budget and Expense') ?>
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">Currency :
                            <?= $project->project_detail->has('currency') ? $project->project_detail->currency->code : '' ?></div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">Budget :
                            <?= $this->Number->format($project->project_detail->budget, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?></div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">Expenses :
                            <?= $this->Number->format($project->project_detail->expenses, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?></div>

                    </div>
                </div>
            </div>
            <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-clock fa-1x text-gray-300"></i>
                    </div>
                    <div class="col border-left ">
                        <i class="fas fa-book fa-1x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2" id="clickable-card" data-attr="">
                        <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                            <?= h('MDA') ?>
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php if (isset($project->pim->mda)) { ?>
                            <p class="card-text"><?= h($project->pim->mda) ?></p>
                        </div>
                        <?php } ?>
                        <?php if (!isset($project->pim->mda)) { ?>
                        <p class="card-text"><?= h('Ogun State Ministry') ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
            <div class="row">
                <div class="col-auto">
                    <i class="fas fa-clock fa-1x text-gray-300"></i>
                </div>
                <div class="col border-left ">
                    <i class="fas fa-book fa-1x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card  shadow h-100 py-0">
        <div class="card-body py-2 px-2">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2" id="clickable-card" data-attr="">
                    <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                        <?= h('Completed Indicators') ?>
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php foreach ($project->milestones as $milestones) : ?>
                        <p class="card-text text-gray-800">
                            <?= $this->Html->link($milestones->description, ['controller' => 'milestones', 'action' => 'view', $milestones->id], ['class' => 'nav-col']) ?>
                        </p>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
            <div class="row">
                <div class="col-auto">
                    <i class="fas fa-clock fa-1x text-gray-300"></i>
                </div>
                <div class="col border-left ">
                    <i class="fas fa-book fa-1x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card  shadow h-100 py-0">
        <div class="card-body py-2 px-2">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2" id="clickable-card" data-attr="">
                    <div class=" font-weight-bold mb-4 mt- 2 text-primary text-uppercase mb-1">
                        <?= h('Risk & Issues') ?>
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?= h($project->project_detail->risk_and_issues) ?></div>
                </div>
            </div>
        </div>
        <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
            <div class="row">
                <div class="col-auto">
                    <i class="fas fa-clock fa-1x text-gray-300"></i>
                </div>
                <div class="col border-left ">
                    <i class="fas fa-book fa-1x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

</div>
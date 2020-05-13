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
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav active"
            style=" font-size: 20px;">Summary</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Indicators', ['controller' => 'projects', 'action' => 'milestones', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold nav" style=" font-size: 20px;">
            <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav"
            style=" font-size: 20px;">Resources</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav" style=" font-size: 20px;">
            <?= $this->Html->link('Partners', ['controller' => 'projectDetails', 'action' => 'partners', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>

        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav"
            style=" font-size: 20px;">Gantt
            Charts</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav" style=" font-size: 20px;">
            <?= $this->Html->link('Documents', ['controller' => 'projects', 'action' => 'documents', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>

    </div>
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
                        <div class="h6 mb-0 font-weight-bold text-gray-800">Budget :
                            <?= $this->Number->currency($project->project_detail->budget) ?></div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">Expenses :
                            <?= $this->Number->currency($project->project_detail->expenses) ?></div>

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

</div>
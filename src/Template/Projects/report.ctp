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
    <div class="mb-4 br-m">
        <div class="py-3 pl-3 bg-default br-t">
            <div class="card-deck mb-3">
                <div class="card card-outline shadow">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Project Brief</h5>
                        <p class="card-text"><?= h($project->name) ?></p>

                    </div>
                </div>
                <div class="card card-outline shadow">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Objectives</h5>
                        <p class="card-text"><?= h($project->introduction) ?></p>
                    </div>
                </div>
                <div class="card card-outline shadow">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Sponsors & Donors</h5>

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
                        <p class="card-text"><?= h($sponsor) ?></p>

                    </div>
                </div>
            </div>
            <div class="card-deck mb-3">
                <div class="card card-outline shadow">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Budget and Expense</h5>
                        <p class="card-text">Budget :
                            <strong><?= $this->Number->currency($project->project_detail->budget) ?></strong>
                        </p>
                        <p class="card-text">Expenses :<strong>
                                <?= $this->Number->currency($project->project_detail->expenses) ?></p>
                        </strong>

                    </div>
                </div>

                <div class="card card-outline shadow">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">PPA</h5>
                        <p class="card-text"><strong><?= $this->Number->currency($project->cost) ?></strong></p>
                    </div>
                </div>
                <div class="card card-outline shadow">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">MDA</h5>
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
        <div class="card-deck">
            <div class="card card-outline shadow">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-primary">Completed Indicators</h5>
                    <?php foreach ($project->milestones as $milestones) : ?>
                    <p class="card-text">
                        <?= $this->Html->link($milestones->description, ['controller' => 'milestones', 'action' => 'view', $milestones->id]) ?>
                    </p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="card card-outline shadow">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-primary">DLI</h5>
                    <p class="card-text">
                        <?= h($project->project_detail->DLI) ?>
                    </p>
                </div>
            </div>
            <div class="card card-outline shadow">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-primary">Risk & Issues</h5>
                    <?= h($project->project_detail->risk_and_issues) ?>

                </div>
            </div>
        </div>
    </div>
</div>
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
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Partners', ['controller' => 'projects', 'action' => 'partners', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav active"
            style=" font-size: 20px;">Risks &
            Issues</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Gantt
            Charts</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav"
            style=" font-size: 20px;">Documents</span>


    </div>
    <div class="card-body">

        <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?> Risks and Issues
        </h2>


        <div class="mb-4 br-m shad">
            <div class="py-3 pl-3 bg-default br-t">
                <div class="card-deck mb-3">
                    <?php $num = 0; ?>
                    <?php foreach ($project->risk_issues as $riskissue) : ?>

                    <?php $num++; ?>

                    <span aria-hidden="true" class="indicator"></span>
                    <div class="card card-outline shadow">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-primary"> Risks & Issues <?= h($num) ?></h5>
                            <p class="card-text">
                                <?= $this->Html->link($riskissue->description, ['controller' => 'riskIssues', 'action' => 'view', $riskissue->id],) ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
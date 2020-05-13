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
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav active"
            style=" font-size: 20px;">Documents</span>

    </div>
    <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?> </h2>
</div>
<div class="ml-4">
    <h4 class="font-weight-bold ">Project Documents</h4>
    <div class="btn-group" role="group" aria-label="Basic example">
        <?= $this->Html->link('<i class="fa fa-plus fa-lg"></i>', ['controller' => 'documents', 'action' => 'add', $project->id], ['id' => 'transmit', 'class' => 'nav-col', 'class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>

    </div>
</div>
<div class="row m-3">
    <?php $num = 0; ?>
    <?php foreach ($project->documents as $document) : ?>
    <?php $num++; ?>
    <?php $filename = $document->file_uploaded; ?>
    <?php $trimfile = explode(".", $filename); ?>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card  shadow h-100 py-0">
            <div class="card-body py-2 px-2">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2" id="clickable-card" data-attr="">
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <p><i style="color: blue;">Title: </i><?= $this->Html->link($trimfile[0], []) ?></p>
                            <p><i style="color: blue;">Date: </i><?= h($document->date_uploaded) ?></p>
                            <p><i style="color: blue;">ID: </i><?= h($document->document_no) ?></p>
                            <p><i style="color: blue;">Type: </i><?= h($document->document_type) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                <div class="row">
                    <div class="col border-left ">
                        <i class="fas fa-book fa-1x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
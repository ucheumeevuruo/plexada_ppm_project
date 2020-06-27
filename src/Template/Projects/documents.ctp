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

<div class="container-fluid  mt-4">

    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'preImplementation']) ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Documents</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->

    <!-- Navigation area -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <?= $this->Html->link('Summary', ['action' => 'report', $project->id], ['id' => 'transmit', 'class' => 'nav-link ']) ?>
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
            <?= $this->Html->link('Gantt Chart', ['action' => 'gantt_chart', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Documents', ['action' => 'documents', $project->id], ['id' => 'transmit', 'class' => 'nav-link active']) ?>
        </li>
    </ul>
    <!-- ./end Navigation area -->

    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Documents</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="btn-group" role="group" aria-label="Basic example">
            <?= $this->Html->link('<i class="fa fa-upload fa-lg"></i>', ['controller' => 'documents', 'action' => 'add', $project->id], ['id' => 'transmit', 'class' => 'nav-col', 'class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>

        </div>
    </nav>


    <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?> </h2>
</div>
<div class="ml-4">

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
                        <div class="col mr-2">
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <!-- <p><i style="color: blue;">Title: </i><?= $this->Html->link($trimfile[0], []) ?></p> -->
                                <p><i class="fa fa-tags"> &nbsp;
                                    </i><?= $this->Html->link($document->file_uploaded, ['controller'=>'projects', 'action'=>'download',$document->id]) ?>
                                </p>
                                <p><i class="fa fa-clock"> &nbsp; </i><?= h($document->date_uploaded) ?></p>
                                <p><i class="fa fa-id-card"> &nbsp; </i><?= h($document->document_no) ?></p>
                                <p><i class="fa fa-sort"> &nbsp; </i><?= h($document->document_type) ?></p>
                                <p><?= $this->Html->link(__('<i class="fas fa-file-download"></i> &nbsp; Download'), ['controller' => 'Projects', 'action' => 'download', $document->id], ['class' => 'text-decoration-none', 'escape' => false, 'title' => 'Download File']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                    <div class="row">
                        <div class="col border-left ">
                            <!-- <i class="fas fa-pencil-alt fa-1x text-gray-300"></i> -->
                            <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-1x text-gray-300"></i>'), ['controller' => 'Documents', 'action' => 'edit', $project->documents[0]->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Document']) ?>
                            &nbsp;
                            <?= $this->Form->postLink(__('<i class="fas fa-trash fa-1x text-gray-300"></i>'), ['controller' => 'Documents', 'action' => 'delete', $document->id], ['confirm' => __('Are you sure you want to delete Document ?', $document->id), 'class' => 'overlay', 'escape' => false, 'title' => 'Delete Document']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<div class="row border-top">

</div>
<!-- MODAL ELEMENTS -->

<div id="dialogModal" class="bg-primary">
    <!-- the external content is loaded inside this tag -->
    <div id="contentWrap">
        <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-lg']) ?>
        <?= $this->Modal->body() // No header
        ?>
        <?= $this->Modal->footer() // Footer with close button (default)
        ?>
        <?= $this->Modal->end() ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        //respond to click event on anything with 'overlay' class
        $(".overlay").click(function(event) {
            event.preventDefault();
            //load content from href of link
            $('#contentWrap .modal-body').load($(this).attr("href"), function() {
                $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content')
                    .removeClass()
                $('#MyModal4').modal('show')
            });
        });
    });
</script>
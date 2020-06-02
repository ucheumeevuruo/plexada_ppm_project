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

echo $this->Html->css('mandatory');

/**
 *
 * This section is used to customize the pagination area.
 * Do not tamper with if you have not read the document https://book.cakephp.org/3/en/controllers/components/pagination.html
 *
 */
$this->Paginator->setTemplates([
    'number' => '',
    'nextActive' => '<li class="nav-item"><a class="nav-link navigator" href="{{url}}">{{text}}</a></li>',
    'nextDisabled' => '<li class="nav-item"><a class="nav-link text-gray-300 unclickable" href="#">{{text}}</a></li>',
    'prevActive' => '<li class="nav-item"><a class="nav-link navigator" href="{{url}}">{{text}}</a></li>',
    'prevDisabled' => '<li class="nav-item"><a class="nav-link text-gray-300 unclickable" href="#">{{text}}</a></li>',
    'first' => '',
    'last' => ''
]);
?>

<div class="container-fluid mt-4">
    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'disbursement']) ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Indicator</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->


    <!-- Navigation area -->
    <ul class="nav nav-tabs">
        <!-- <li class="nav-item">
            <?= $this->Html->link('Summary', ['action' => 'report', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li> -->
        <li class="nav-item">
            <?= $this->Html->link('Indicators', [], ['id' => 'transmit', 'class' => 'nav-link active']) ?>
        </li>
        <!-- <li class="nav-item">
            <?= $this->Html->link('Activities', ['action' => 'activities', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Partners', ['controller' => 'projectDetails', 'action' => 'partners', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Gantt Charts', ['action' => 'gantt_chart', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Documents', ['action' => 'documents', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li> -->
    </ul>
    <!-- ./end Navigation area -->


    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Indicators</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <!-- <div class="mr-auto mt-2 mt-lg-0">
                <?= $this->Html->link(__('Create'), ['controller' => 'milestones', 'action' => 'add', $project_id], ['class' => 'btn btn-info rounded-0 overlay', 'title' => 'Add', 'escape' => false]) ?>
            </div> -->
            <!-- Search Form -->
            <form class="form-inline my-2 my-lg-0" method="get" id="searchable">
                <input class="form-control rounded-0" type="search" name="q" placeholder="Search">
                <button class="btn btn-outline-info rounded-0 my-2 my-sm-0 navigator" type="submit">Search</button>
            </form>
            <!-- ./end Search form -->

            <!-- Pagination -->
            <span class="navbar-text ml-3 pl-4 border-left">
                <?= $this->Paginator->counter(['format' => __('{{count}}  of {{pages}}')]) ?>
            </span>
            <!-- ./end pagination -->

            <div class="mt-2 mt-lg-0">
                <ul class="navbar-nav">
                    <?= $this->Paginator->prev(__('<i class="fas fa-less-than fa-1x"></i>'), ['class' => 'test', 'escape' => false]) ?>

                    <?= $this->Paginator->next(__('<i class="fas fa-greater-than fa-1x"></i>'), ['escape' => false]) ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-th-large fa-1x"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-list fa-1x text-gray-300"></i></a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- .\end Menu Area -->
    <?php foreach ($milestones as $milestone) : ?>
    <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($milestone->project->name) ?> </h2>
    <?php break; ?>
    <?php endforeach; ?>

    <div class="grey-bg vh-4 py-4">
        <div class="row mx-0">
            <?php foreach ($milestones as $milestone) : ?>
            <div class="col-xl-3 col-md-6 mb-4"
                data-attr="<?= $this->Url->build(['controller' => 'milestones', 'action' => 'view', $project_id]) ?>">
                <div
                    class="card <?= $this->Indicator->status($milestone->has('status') ? $milestone->status->lov_value : '') ?> shadow py-0">
                    <div class="card-body py-2 px-2">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $milestone->name ?>
                                </div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?= $this->NumberFormat->format($milestone->amount, ['before' => $milestone->project->project_detail->has('currency') ? $milestone->project->project_detail->currency->symbol : '']) ?>
                                </div>
                            </div>
                            <!--                            <div class="col-auto">-->
                            <!--                                <i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                    <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                        <div class="row">
                            <div class="col-auto">
                                <?= $this->Html->link(__('<i class="fas fa-plus-circle fa-1x text-gray-300"></i>'), ['controller' => 'disbursements', 'action' => 'add', $milestone->id], ['class' => 'overlay', 'escape' => false]) ?>
                            </div>
                            <!-- <div class="col-auto border-left">
                                <?= $this->Form->postLink(__("<i class='fas fa-trash fa-1x text-gray-300'></i>"), ['controller' => 'milestones', 'action' => 'delete', $milestone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milestone->id), 'escape' => false]) ?>
                            </div> -->
                            <div class="col-auto dropdown no-arrow border-left">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fas fa-info-circle fa-1x text-gray-300"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-item text-gray-900">Status:
                                        <?= $milestone->has('status') ? $milestone->status->lov_value : 'Not Defined' ?></div>
                                    <div class="dropdown-item text-gray-900">Start Date: <?= $milestone->start_date ?>
                                    </div>
                                    <div class="dropdown-item text-gray-900">End Date: <?= $milestone->end_date ?></div>
                                </div>
                                <!--                                <i class="fas fa-info-circle fa-1x text-gray-300"></i>-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
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
</div>
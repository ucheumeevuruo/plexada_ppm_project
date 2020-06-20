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
<section id="flyby">
    <div class="container-fluid mt-4">
        <!-- Breadcrumb area -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <?= $this->Html->link(__('Projects'), ['action' => 'preImplementation']) ?>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Activities</li>
            </ol>
        </nav>
        <!-- ./end Breadcrumb -->

        <!-- Navigation area -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <?= $this->Html->link('Summary', ['action' => 'report', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Indicators', ['action' => 'milestones', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Activities', ['action' => 'activities', $project_id], ['id' => 'transmit', 'class' => 'nav-link active']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Disbursement', ['controller' => 'projects', 'action' => 'disburse', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Gantt Chart', ['action' => 'gantt_chart', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Documents', ['action' => 'documents', $project_id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
            </li>
        </ul>
        <!-- ./end Navigation area -->

        <!-- Menu area [Search, pagination] -->
        <!-- I was supposed to put this section in the element template but will do that soon. -->
        <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
            <a class="navbar-brand" href="#">Activities</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <div class="mr-auto mt-2 mt-lg-0">
                    <?= $this->Html->link(__('Create'), ['controller' => 'activities', 'action' => 'add', $project_id], ['class' => 'btn btn-info rounded-0 overlay', 'title' => 'Add', 'escape' => false]) ?>
                </div>
                <!-- Search Form -->
                <form class="form-inline my-2 my-lg-0" method="get" id="searchable">
                    <input class="form-control rounded-0" type="search" name="q" placeholder="Search">
                    <button class="btn btn-outline-info rounded-0 my-2 my-sm-0 navigator" type="submit">Search</button>
                </form>
                <!-- ./end Search form -->

                <!-- Pagination -->
                <span class="navbar-text ml-3 pl-4 border-left">
                    <?= $this->Paginator->counter(['format' => __('{{count}} of {{pages}}')]) ?>
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

        <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?>
        </h2>


        <div class="grey-bg py-4">
            <div class="row mx-0">
                <?php foreach ($activities as $activity) : ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <?php if ($activity->status_id == 1) : ?>
                            <div class="card shadow py-0 border border-left-light rounded-lg">
                            <?php endif; ?>

                            <?php if ($activity->status_id == 3) : ?>
                                <div class="card shadow py-0 border border-left-dark rounded-lg">
                                <?php endif; ?>
                                <div class="card-body py-2 px-2">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2" id="clickable-sub-applet" data-attr="<?= $this->Url->build(['controller' => 'activities', 'action' => 'view', $activity->activity_id]) ?>">
                                            <?php foreach ($milestones as $milestone) : ?>
                                                <?php if ($activity->milestone_id == $milestone->id) : ?>
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        <?= $milestone->name ?> / <?= $activity->name ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <?= $this->NumberFormat->format($activity->cost, ['before' => $activity->currency->symbol]) ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                                    <div class="row">
                                        <div class="col-auto">
                                            <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-1x text-gray-300"></i>'), ['controller' => 'activities', 'action' => 'edit', $activity->activity_id], ['class' => 'overlay', 'escape' => false]) ?>
                                        </div>
                                        <div class="col-auto border-left">
                                            <?= $this->Form->postLink(__("<i class='fas fa-trash fa-1x text-gray-300'></i>"), ['controller' => 'activities', 'action' => 'delete', $activity->activity_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id), 'escape' => false]) ?>
                                        </div>
                                        <div class="col-auto dropdown no-arrow border-left">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="fas fa-info-circle fa-1x text-gray-300"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-item text-gray-900">Project Name:
                                                    <?= h($activity->project->name) ?>
                                                </div>
                                                <div class="dropdown-item text-gray-900">Indicator Name:
                                                    <?= $activity->has('milestone') ? $activity->milestone->name : 'Not Assigned t0 indicator' ?>

                                                </div>
                                                <div class="dropdown-item text-gray-900">Activity Name:
                                                    <?= h($activity->name) ?>
                                                </div>
                                                <div class="dropdown-item text-gray-900">Activity Status:
                                                    <?= $activity->has('status') ? $activity->status->lov_value : 'Not Defined' ?>
                                                </div>
                                                <div class="dropdown-item text-gray-900">Assigned to:
                                                    <?= h($activity->staff->full_name) ?>
                                                </div>
                                                <div class="dropdown-item text-gray-900">Challenges/Issues:
                                                    <?= $activity->has('issues') ? $activity->issues : 'No Issue found' ?>
                                                </div>
                                                <div class="dropdown-item text-gray-900">Next line of Action:
                                                    <?= h($activity->next_activity) ?>
                                                </div>
                                                <div class="dropdown-item text-gray-900">No of Task(s):
                                                    <?= h(count($activity->tasks)) ?>
                                                </div>
                                                <div class="dropdown-item text-gray-900">No of Completed Task(s):
                                                    <?= h(count($activity->tasks)) ?>
                                                </div>
                                                <div class="dropdown-item text-gray-900">PM Comments:
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            </div>
            <div class="py-0" id="sub-applet">

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
                    $(document).on('click', '#clickable-sub-applet', function(event) {
                        event.preventDefault();
                        let href = $(this).attr('data-attr');
                        $.ajax({
                            url: href,
                            // contentType: "application/json",
                            // dataType: 'json',
                            beforeSend: function() {
                                $('#loader').show();
                            },
                            success: function(result) {
                                $('#sub-applet').html(result);
                                // history.pushState(null, null, href);
                            },
                            complete: function() {
                                $('#loader').hide();
                            },
                            error: function(jqXHR, testStatus, error) {

                                console.log(error);
                                alert("Page " + href + " cannot open. Error:" + error);
                                $('#loader').hide();
                            },
                            timeout: 8000
                        })
                    })
                });
            </script>
        </div>
</section>
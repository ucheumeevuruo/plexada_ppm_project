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
<!-- section area. This is where the ajax call places the element on -->
<section id="flyby">
    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Projects</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="mr-auto mt-2 mt-lg-0">
                <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-info rounded-0 overlay', 'title' => 'Add', 'escape' => false]) ?>
            </div>
            <div class="col-auto">
            </div>
            <!-- Search Form -->
            <form class="form-inline my-2 my-lg-0" method="get" id="searchable">
                <input class="form-control rounded-0" type="search" name="q" placeholder="Search">
                <button class="btn btn-outline-info rounded-0 my-2 my-sm-0 navigator" type="submit">Search</button>
            </form>
            <!-- ./end Search form -->

        </div>
    </nav>
    <!-- .\end Menu Area -->


    <div class="container-fluid ">

        <!-- Breadcrumb area -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Projects</li>
                <!-- <li class="float-right!" >Projects</li> -->
            </ol>
        </nav>
        <!-- ./end Breadcrumb -->
        <div style="background-color: #EAECF4">
            <h6 class="progress">
                <strong class="progress-bar bg-dark mr-2 rounded" role="progressbar" style="width:5%">white</strong><strong class="mr-1">Project about to kick off </strong>
                <span class="progress-bar bg-danger mr-2 rounded" role="progressbar" style="width:5%"></span><strong class="mr-1">Active but with major concerns </strong>
                <span class="progress-bar bg-warning mr-2 rounded" role="progressbar" style="width:5%"></span><strong class="mr-1">Active but with limited concerns </strong>
                <span class="progress-bar bg-primary mr-2 rounded" role="progressbar" style="width:5%"></span><strong class="mr-1">Project On hold </strong>
                <span class="progress-bar bg-success mr-2 rounded" role="progressbar" style="width:5%"></span><strong class="mr-1">Project On track </strong>
                <strong class="progress-bar bg-dark mr-2 rounded" role="progressbar" style="width:5%">Black</strong><strong class="mr-1">Project Completed </strong>
            </h6>
        </div>
        <div class="grey-bg">

            <div class="fa-border border-dark">

                <h6 class="font-weight-bolder ml-3">Implementation Stage</h6>
                <div class="row mx-0">
                    <?php foreach ($projects as $project) : ?>
                        <?php $count = 0; ?>
                        <?php $close = 0; ?>
                        <?php $one = 1; ?>
                        <?php foreach ($milestones as $milestone) : ?>
                            <?php if ($milestone->project_id == $project->id) {
                                $count++;
                            } ?>
                            <?php if ($milestone->project_id == $project->id && $milestone->status_id == 3) {
                                $close++;
                            } ?>
                        <?php endforeach; ?>
                        <?php if ($count != 0 && (($close / $count * 100) < 100)) { ?>
                            <?php foreach ($approvals as $approval) : ?>
                                <?php if ($approval->documents_approval == 'Y' && $approval->design_approval == 'Y' && $approval->project_approval == 'Y'  && $approval->project_id == $project->id) : ?>
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <?php $statusColor = ''; ?>
                                        <?php $closePercent = ($close / $count * 100); ?>
                                        <?php if (date_create($project->project_detail->start_dt) > date_create($todayDate)) {
                                            $statusColor = 'light';
                                        } elseif ($closePercent < 40) {
                                            $statusColor = 'danger';
                                        } elseif ($closePercent >= 40 && $closePercent < 80) {
                                            $statusColor = 'warning';
                                        } elseif ($closePercent >= 80 && $closePercent < 100) {
                                            $statusColor = 'success';
                                        } ?>
                                        <div class="card shadow h-100 py-0 border border-left-<?= $statusColor ?> rounded-lg">
                                            <div class="card-body py-2 px-2">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2" id="clickable-card" data-attr="<?= $this->Url->build(['action' => 'reportImplementation', $project->id]) ?>">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            <?= $project->name ?>
                                                        </div>
                                                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                            <?= $project->has('project_detail') ? $this->NumberFormat->format(
                                                                $project->project_detail->budget,
                                                                ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']
                                                            )  : '0.00' ?>
                                                        </div>
                                                    </div>
                                                    <?php if (date_create($project->project_detail->start_dt) > date_create($todayDate)) { ?>
                                                        <?php $dateDiff =  date_diff(date_create($todayDate), date_create($project->project_detail->start_dt))->format('%R%a day(s)') ?>
                                                        <div>
                                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                <?= h('Start Date') ?>
                                                            </div>
                                                            <div class="text-xs font-weight-bold text-default text-uppercase mb-1">
                                                                <?= h($dateDiff) ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="col-auto">
                                                        <?php $container = array(); ?>
                                                        <?php foreach ($activities as $activity) : ?>
                                                            <?php if ($activity->project_id == $project->id) : ?>
                                                                <?php array_push($container, $activity->percentage_completion); ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <?php foreach ($activities as $activity) : ?>
                                                            <?php if ($activity->project_id == $project->id) : ?>
                                                                <?php if (in_array(7, $container)) : ?>
                                                                    <i class="fas fa-check-circle fa-2x text-gray-300" style="color: red !important"></i>
                                                                    <?php break; ?>
                                                                <?php elseif (in_array(8, $container)) : ?>
                                                                    <i class="fas fa-check-circle fa-2x text-gray-300" style="color: yellow !important"></i>
                                                                    <?php break; ?>
                                                                <?php elseif (in_array(9, $container)) : ?>
                                                                    <i class="fas fa-check-circle fa-2x text-gray-300" style="color: blue !important"></i>
                                                                    <?php break; ?>
                                                                <?php elseif (in_array(10, $container)) : ?>
                                                                    <i class="fas fa-check-circle fa-2x text-gray-300" style="color: #36B9CC !important"></i>
                                                                    <?php break; ?>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <?= $this->Html->link(__('<i class="fas fa-plus-square fa-1x text-primary-300"></i>'), ['controller' => 'milestones', 'action' => 'add', $project->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Add Indicator']) ?>
                                                    </div>

                                                    <div class="col-auto">
                                                        <!-- <?= $this->Html->link(__('<i class="fas fa-plus-circle fa-1x text-gray-300" style="color: #36B9CC !important"></i>'), ['controller' => 'activities', 'action' => 'add', $project->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Add Activity']) ?> -->
                                                    </div>
                                                    <div class="col-auto dropdown no-arrow border-left">

                                                        <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                            <?php $actNum = 1; ?>
                                                            <?php foreach ($activities as $act) : ?>
                                                                <?php if ($act->project_id == $project->id) : ?>
                                                                    <div class="dropdown-item text-gray-900">
                                                                        <?= h($actNum++) ?>. <?= h($act->name) ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>


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
<div id="dialogModal" class="bg-primary">
    <!-- the external content is loaded inside this tag -->
    <div id="contentWrap2">
        <?= $this->Modal->create(['id' => 'MyModal5', 'size' => 'modal-lg']) ?>
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
        $(".sub-layer").click(function(event) {
            event.preventDefault();
            openUrl($(this).attr('href'), $(this))
        })
    });
</script>
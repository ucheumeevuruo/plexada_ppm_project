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

            <div class="col-auto mr-auto">
            </div>
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

    <div class="container-fluid">

        <!-- Breadcrumb area -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <?= $this->Html->link(__('Projects'), ['action' => 'planning']) ?>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Planning</li>
            </ol>
        </nav>
        <!-- ./end Breadcrumb -->

        <h3 class="text-primary text-left font-weight-bold mt-0">Select Project </h3>

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
        <div class="grey-bg vh-5 py-4">

            <div class="row mx-0">
                <?php foreach ($projects as $project) : ?>
                    <?php $count = 0; ?>
                    <?php $close = 0; ?>
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
                                                <div class="col mr-2" id="clickable-card" data-attr="<?= $this->Url->build(['action' => 'planIndicators', $project->id]) ?>">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        <?= $project->name ?>
                                                    </div>
                                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                        <?= $project->has('project_detail') ? $this->NumberFormat->format(
                                                            $project->project_detail->budget,
                                                            ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']
                                                        )  : '0.00' ?></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                                            <div class="row">
                                                <div class="col-auto">


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
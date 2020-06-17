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

        <div class="grey-bg">
            <div class="fa-border border-dark">
                <h6 class="font-weight-bolder ml-3">Concept Stage</h6>
                <div class="row mx-0">
                    <?php foreach ($projects as $project) : ?>
                        <?php foreach ($projectDetails as $pro) : ?>
                            <?php if ($project->id == $pro->project_id && $pro->name == null) : ?>
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
                                <?php if ($count == 0) { ?>
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card shadow h-100 py-0 border border-left-light rounded-lg">
                                            <div class="card-body py-2 px-2">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
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

                                                </div>
                                            </div>
                                            <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <?php foreach ($projectDetails as $projectD) : ?>
                                                            <?php if (!isset($projectD->name) && $projectD->project_id == $project->id) : ?>
                                                                <?= $this->Html->link(__('<i class="fas fa-plus fa-1x text-gray-300"></i>'), ['controller' => 'projectDetails', 'action' => 'edit', $project->project_detail->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Add Project Details']) ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <div class="col-auto">
                                                        <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-1x text-gray-300"></i>'), ['action' => 'edit', $project->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Project']) ?>
                                                    </div>
                                                    <div class="col-auto border-left">
                                                        <?= $this->Form->postLink(__("<i class='fas fa-trash fa-1x text-gray-300'></i>"), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'escape' => false, 'title' => 'Delete Project']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>


            <div class="fa-border border-dark">
                <h6 class="font-weight-bolder ml-3">Design Stage</h6>
                <div class="row mx-0">
                    <?php foreach ($projects as $project) : ?>
                        <?php foreach ($projectDetails as $pro) : ?>
                            <?php if ($project->id == $pro->project_id && $pro->name != null) : ?>
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
                                <?php if ($count == 0) { ?>
                                    <?php foreach ($approvals as $approval) : ?>
                                        <?php if ($approval->documents_approval == 'N' && $approval->design_approval == 'N' && $approval->project_approval == 'N' && $approval->project_id == $project->id) : ?>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="card shadow h-100 py-0 border border-left-light rounded-lg">
                                                    <div class="card-body py-2 px-2">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
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
                                                        </div>
                                                    </div>
                                                    <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <?php foreach ($projectDetails as $projectD) : ?>
                                                                    <?php if (isset($projectD->name) && $projectD->project_id == $project->id) : ?>
                                                                        <?= $this->Html->link(__('<i class="fas fa-edit fa-1x text-gray-300"></i>'), ['controller' => 'projectDetails', 'action' => 'edit', $project->project_detail->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Project Details']) ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <div class="col-auto">
                                                                <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-1x text-gray-300"></i>'), ['action' => 'edit', $project->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Project']) ?>
                                                            </div>
                                                            <div class="col-auto border-left">
                                                                <?= $this->Form->postLink(__("<i class='fas fa-trash fa-1x text-gray-300'></i>"), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'escape' => false, 'title' => 'Delete Project']) ?>
                                                            </div>
                                                            <div class="col-auto border-left">
                                                                <?php if (strtolower($_SESSION['Auth']['Users']->role->name) == "administrator") { ?>
                                                                    <?= $this->Html->link(__('<i class="fas fas fa-check-circle fa-1x text-gray-300"></i>'), ['controller' => 'Approvals', 'action' => 'designApproval', $approval->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Approve Design']) ?>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="fa-border border-dark">
                <h6 class="font-weight-bolder ml-3">Planning Stage</h6>
                <div class="row mx-0">
                    <?php foreach ($projects as $project) : ?>
                        <?php foreach ($projectDetails as $projectDetail) : ?>
                            <?php if ($project->id == $projectDetail->project_id && $projectDetail->name != null) : ?>

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
                                <?php if ($count == 0 || (($close / $count * 100) < 100)) { ?>
                                    <?php foreach ($approvals as $approval) : ?>
                                        <?php if ($approval->documents_approval == 'N' && $approval->design_approval == 'Y' && $approval->project_approval == 'N'  && $approval->project_id == $project->id) : ?>

                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="card shadow h-100 py-0 border  rounded-lg">
                                                    <div class="card-body py-2 px-2">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2" id="clickable-card" data-attr="<?= $this->Url->build(['action' => 'report', $project->id]) ?>">
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
                                                        </div>
                                                    </div>
                                                    <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <?php foreach ($projectDetails as $projectD) : ?>
                                                                    <?php if (isset($projectD->name) && $projectD->project_id == $project->id) : ?>
                                                                        <?= $this->Html->link(__('<i class="fas fa-edit fa-1x text-gray-300"></i>'), ['controller' => 'projectDetails', 'action' => 'edit', $project->project_detail->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Project Details']) ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <div class="col-auto">
                                                                <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-1x text-gray-300"></i>'), ['action' => 'edit', $project->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Project']) ?>
                                                            </div>
                                                            <div class="col-auto border-left">
                                                                <?= $this->Form->postLink(__("<i class='fas fa-trash fa-1x text-gray-300'></i>"), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'escape' => false, 'title' => 'Delete Project']) ?>
                                                            </div>
                                                            <div class="col-auto border-left">
                                                                <?= $this->Html->link(__('<i class="fas fa-book fa-1x text-gray-300"></i>'), ['controller' => 'Documents', 'action' => 'addDoc', $project->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Add Project Document']) ?>
                                                            </div>
                                                            <div class="col-auto border-left">
                                                                <?php if (strtolower($_SESSION['Auth']['Users']->role->name) == "administrator") { ?>
                                                                    <?php if ($count != 0) { ?>
                                                                        <?= $this->Html->link(__('<i class="fas fas fa-check-circle fa-1x text-gray-300"></i>'), ['controller' => 'Approvals', 'action' => 'documentsApproval', $approval->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Approve Documents']) ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="fa-border border-dark">
                <h6 class="font-weight-bolder ml-3">Completion Stage</h6>
                <div class="row mx-0">
                    <?php foreach ($projects as $project) : ?>
                        <?php foreach ($projectDetails as $projectDetail) : ?>
                            <?php if ($project->id == $projectDetail->project_id && $projectDetail->name != null) : ?>

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
                                <?php if ($count == 0 || (($close / $count * 100) < 100)) { ?>
                                    <?php foreach ($approvals as $approval) : ?>
                                        <?php if ($approval->documents_approval == 'Y' && $approval->design_approval == 'Y' && $approval->project_approval == 'N'  && $approval->project_id == $project->id) : ?>

                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="card shadow h-100 py-0 border  rounded-lg">
                                                    <div class="card-body py-2 px-2">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2" id="clickable-card" data-attr="<?= $this->Url->build(['action' => 'report', $project->id]) ?>">
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
                                                        </div>
                                                    </div>
                                                    <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <?php foreach ($projectDetails as $projectD) : ?>
                                                                    <?php if (isset($projectD->name) && $projectD->project_id == $project->id) : ?>
                                                                        <?= $this->Html->link(__('<i class="fas fa-edit fa-1x text-gray-300"></i>'), ['controller' => 'projectDetails', 'action' => 'edit', $project->project_detail->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Project Details']) ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <div class="col-auto">
                                                                <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-1x text-gray-300"></i>'), ['action' => 'edit', $project->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Project']) ?>
                                                            </div>
                                                            <div class="col-auto border-left">
                                                                <?= $this->Form->postLink(__("<i class='fas fa-trash fa-1x text-gray-300'></i>"), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'escape' => false, 'title' => 'Delete Project']) ?>
                                                            </div>

                                                            <div class="col-auto border-left">
                                                                <?php if (strtolower($_SESSION['Auth']['Users']->role->name) == "administrator") { ?>
                                                                    <?= $this->Html->link(__('<i class="fas fas fa-check-circle fa-1x text-gray-300"></i>'), ['controller' => 'Approvals', 'action' => 'projectApproval', $approval->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Approve Project']) ?>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
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
</section>
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
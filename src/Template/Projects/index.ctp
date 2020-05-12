<?php
/**
 * @var \App\View\AppView $this
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
        <a class="navbar-brand" href="#">Project Details</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="mr-auto mt-2 mt-lg-0">
                <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-info rounded-0 navigator', 'title' => 'Add', 'escape' => false]) ?>
            </div>
            <!-- Search Form -->
            <form class="form-inline my-2 my-lg-0" method="get" id="searchable">
                <input class="form-control rounded-0" type="search" name="q" placeholder="Search">
                <button class="btn btn-outline-info rounded-0 my-2 my-sm-0 navigator" type="submit">Search</button>
            </form>
            <!-- ./end Search form -->

            <!-- Pagination -->
            <span class="navbar-text ml-3 pl-4 border-left">
                    <?= $this->Paginator->counter(['format' => __('{{page}}/{{pages}}  of {{count}}')]) ?>
            </span>
            <!-- ./end pagination -->

            <div class="mt-2 mt-lg-0">
                <ul class="navbar-nav">
                    <?= $this->Paginator->prev(__('<i class="fas fa-less-than fa-1x"></i>'), ['class' => 'test', 'escape' => false]) ?>

                    <?= $this->Paginator->next(__('<i class="fas fa-greater-than fa-1x"></i>'), ['escape' => false]) ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-th-large fa-1x"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-list fa-1x text-gray-300"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- .\end Menu Area -->

    <div class="container-fluid">

        <!-- Breadcrumb area -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Projects</li>
            </ol>
        </nav>
        <!-- ./end Breadcrumb -->

        <div class="row">
            <?php foreach ($projects as $project): ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card <?= $this->Indicator->status($project->project_detail->has('status')?$project->project_detail->status->lov_value:'') ?> shadow h-100 py-0">
                        <div class="card-body py-2 px-2">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2" id="clickable-card" data-attr="<?= $this->Url->build(['action' => 'milestones', $project->id]) ?>">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?= $project->name ?>
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $this->NumberFormat->format($project->cost, ['before' => '₦']) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
            <?php endforeach; ?>
        </div>
    </div>
</section>


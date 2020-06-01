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
                <!-- <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-info rounded-0 navigator', 'title' => 'Add', 'escape' => false]) ?> -->
                <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'overlay btn btn-info', 'escape' => false]) ?>
            </div>
            <div class="col-auto">
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
                <li class="breadcrumb-item active" aria-current="page">Projects</li>
            </ol>
        </nav>
        <!-- ./end Breadcrumb -->

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
                    <div class="col-xl-3 col-md-6 mb-4">

                        <?php if ($count == 0) : { ?>
                                <div class="card shadow h-100 py-0 border border-left-light rounded-lg">

                                <?php } elseif (($close / $count * 100) < 40) : { ?>
                                    <div class="card shadow h-100 py-0 border border-left-danger rounded-lg">

                                    <?php } elseif ((($close / $count * 100) >= 40) && (($close / $count * 100) < 60)) : { ?>
                                        <div class="card shadow h-100 py-0 border border-left-warning rounded-lg">

                                        <?php } elseif ((($close / $count * 100) >= 60) && (($close / $count * 100) < 80)) : { ?>
                                            <div class="card shadow h-100 py-0 border border-left-warning rounded-lg">

                                            <?php } elseif ((($close / $count * 100) >= 80) && (($close / $count * 100) < 100)) : { ?>
                                                <div class="card shadow h-100 py-0 border border-left-success rounded-lg">

                                                <?php } elseif (($close / $count * 100) == 100) : { ?>
                                                    <div class="card shadow h-100 py-0 border border-left-dark rounded-lg">

                                                    <?php  } ?>
                                                <?php endif; ?>

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
                                                                )  : '0.00' ?></div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-1x text-gray-300"></i>'), ['action' => 'edit', $project->id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Project']) ?>
                                                        </div>
                                                        <div class="col-auto border-left">
                                                            <?= $this->Form->postLink(__("<i class='fas fa-trash fa-1x text-gray-300'></i>"), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'escape' => false, 'title' => 'Delete Project']) ?>
                                                        </div>
                                                        <div class="col-auto border-left dropdown no-arrow">
                                                            <?php if($project->has('activities') && !empty($project->activities)){ ?>
                                                                <?= $this->Html->link(__('<i class="fas fa-clock fa-1x text-warning"></i>'),
                                                                    ['controller' => 'api/activities', 'action' => 'index', 'q' => $project->id],
                                                                    ['class' => 'sub-layer', 'escape' => false, 'title' => 'View Activities', 'data-attr' => $project->id]
                                                                ) ?>
                                                            <?php }else{ ?>
                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink<?= $project->id?>"
                                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <i class="fas fa-clock fa-1x text-gray-300"></i>
                                                                </a>
                                                            <?php } ?>
                                                            <div id="dropdown-layer<?= $project->id?>" class="dropdown-menu shadow"
                                                                 aria-labelledby="dropdownMenuLink<?= $project->id?>" style="width: 500px;font-size:.75em">
                                                                <span role="menuitem" class="dropdown-item-text text-center o_no_activity">
                                                                    No activities planned.
                                                                </span>
                                                                <div class="dropdown-divider mt-0"></div>
                                                                <div role="menuitem" class="o_schedule_activity dropdown-header py-1 text-center">
                                                                    <?= $this->Html->link(__('Create'), ['controller' => 'activities', 'action' => 'add', $project->id], ['class' => 'overlay btn btn-info rounded-0', 'escape' => false]) ?>
                                                                </div>
                                                            </div>
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
    function openUrl(href, object){
        let body = '';
        let project_id = object.attr('data-attr')
        $.ajax({
            url: href,
            // contentType: "application/json",
            // dataType: 'json',
            beforeSend: function(){
                $('#dropdown-layer'+ project_id + ' .o_no_activity').html(
                    `<div class="px-5">
                         <i class="fas fa-spinner fa-spin fa-3x"></i>
                     </div>`
                )
                $('#dropdown-layer'+project_id).addClass('show');
                // $('#loader').show();
                // object.after(
                //     `<div id="dropdown-layer${project_id}" class="dropdown-menu shadow animated--fade-in show"
                //     aria-labelledby="dropdownMenuLink${project_id}" style="width: 500px">
                //         <div class="container-fluid activity">
                //             <div class="px-5" style='width: 20px;'>
                //                 <i class="fas fa-spinner fa-spin fa-3x"></i>
                //             </div>
                //         </div>
                //     </div>`
                // );
            },
            success: function(result){
                $.each(result.result, function (index, activities) {
                    // console.log(activities)
                    $.each(activities, function (key, activity) {
                        // console.log(activity.name)

                        body += `<tr><td>${activity.name}</td>
<!--                                <td>${activity.description}</td>-->
                                <td>${activity.staff.last_name} ${activity.staff.first_name}</td>
                                <td>${activity.status.lov_value}</td>
                                <td>${activity.start_date}</td>
                                <td>${activity.end_date}</td></tr>`
                    })
                })
                object.parent().addClass('dropdown show no-arrow')
                object.replaceWith(`<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink${project_id}"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-clock fa-1x text-warning"></i>
                    </a>`
                );
                $('#dropdown-layer' + project_id + ' .o_no_activity').replaceWith(
                    `<table class="table table-sm table-striped table-responsive">
                        <thead>
                            <th>Name</th>
<!--                            <th>Description</th>-->
                            <th>Assigned To</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </thead>
                        <tbody>
                            ${body}
                        </tbody>
                    </table>`
                );
            },
            complete: function(){
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error){
                alert("Page " + href + " cannot open.");
                $('#loader').hide();
            },
            // timeout: 5000
        })
    }
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
        $(".sub-layer").click(function (event) {
            event.preventDefault();
            openUrl($(this).attr('href'), $(this))
        })
    });
</script>
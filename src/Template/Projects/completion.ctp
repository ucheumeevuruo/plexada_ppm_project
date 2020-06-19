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
                <strong class="progress-bar bg-dark mr-2 rounded" role="progressbar" style="width:5%">Black</strong><strong class="mr-1">Project Completed </strong>
        </div>
        <div class="grey-bg">
            <div class="fa-border border-dark">
                <h6 class="font-weight-bolder ml-3">Completion Stage</h6>
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
                        <?php if ($count != 0 && ($close / $count * 100) == 100) { ?>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card shadow C h-100 py-0 border border-left-dark">
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
                                            <div class="col-auto">
                                                <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
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
    function openUrl(href, object) {
        let body = '';
        let project_id = object.attr('data-attr')
        $.ajax({
            url: href,
            // contentType: "application/json",
            // dataType: 'json',
            beforeSend: function() {
                $('#dropdown-layer' + project_id + ' .o_no_activity').html(
                    `<div class="px-5">
                         <i class="fas fa-spinner fa-spin fa-3x"></i>
                     </div>`
                )
                $('#dropdown-layer' + project_id).addClass('show');

            },
            success: function(result) {
                $.each(result.result, function(index, activities) {
                    // console.log(activities)
                    $.each(activities, function(key, activity) {
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
                    </a>`);
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
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
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
        $(".sub-layer").click(function(event) {
            event.preventDefault();
            openUrl($(this).attr('href'), $(this))
        })
    });
</script>
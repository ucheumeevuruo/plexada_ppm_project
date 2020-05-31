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

<section id="flyby">

    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Activities</a>
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
                    <?= $this->Html->link(__('Projects'), ['action' => 'monitoring']) ?>
                </li>
                <li>
                    &nbsp; /
                    <?= $this->Html->link(__('Monitoring'), ['action' => 'monitoring']) ?>
                </li>
                <li>
                    &nbsp; /
                    <?= $this->Html->link(__('Indicators'), ['action' => 'monitorIndicators',$project_id_]) ?>
                </li>
                <li class="breadcrumb-item active" aria-current="page">&nbsp; / Activities</li>
            </ol>
        </nav>
        <!-- ./end Breadcrumb -->

        <h3 class="text-primary text-left font-weight-bold mt-0">Select Activities </h3>

        <!-- .\end Menu Area -->

        <div class="grey-bg vh-4 py-4">
            <div class="row mx-0">
                <?php foreach ($activities as $activity) : ?>
                    <div class="col-xl-3 col-md-6 mb-4" data-attr="">
                        <div class="card shadow py-0">
                            <div class="card-body py-2 px-2">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <!-- <?= h($activity->name) ?> -->
                                            <?= $this->Html->link(__($activity->name), ['action' => 'plan', $activity->activity_id], []) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer no-gutters align-items-center py-0" style="background:#fff">
                                <div class="row">
                                    <div class="col-auto">
                                        <!-- <?= $this->Html->link(__('<i class="fas fa-plus fa-1x text-gray-300"></i>'), ['controller' => 'Plans', 'action' => 'add', $activity->activity_id], ['class' => 'overlay', 'escape' => false, 'title' => 'Add Plan']) ?> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
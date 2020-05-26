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
                    <?= $this->Html->link(__('Projects'), ['action' => 'index']) ?>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Planning</li>
            </ol>
        </nav>
        <!-- ./end Breadcrumb -->


        <div class="grey-bg vh-4 py-4">
            <div class="row mx-0">
                <?php foreach ($plans as $activity) : ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div
                        class="card <?= $this->Indicator->status($activity->has('status') ? $activity->status->lov_value : '') ?> shadow py-0">
                        <div class="card-body py-2 px-2">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?= $activity->name ?>
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
                                    <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-1x text-gray-300"></i>'), ['controller' => 'activities', 'action' => 'edit', $activity->activity_id], ['class' => 'overlay', 'escape' => false, 'title' => 'Edit Activity']) ?>
                                </div>
                                <div class="col-auto border-left">
                                    <?= $this->Form->postLink(__("<i class='fas fa-trash fa-1x text-gray-300'></i>"), ['controller' => 'activities', 'action' => 'delete', $activity->activity_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id), 'escape' => false, 'title' => 'Delete Activity']) ?>
                                </div>
                                <div class="col-auto dropdown no-arrow border-left" title="Activity Details">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fas fa-info-circle fa-1x text-gray-300"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-item text-gray-900">Status:
                                            <?= $activity->has('status') ? $activity->status->lov_value : 'Not Defined' ?>
                                        </div>
                                        <div class="dropdown-item text-gray-900">Start Date:
                                            <?= $activity->start_date ?></div>
                                        <div class="dropdown-item text-gray-900">End Date: <?= $activity->end_date ?>
                                        </div>
                                    </div>
                                    <!--                                <i class="fas fa-info-circle fa-1x text-gray-300"></i>-->
                                </div>
                                <div class="col-auto">
                                    <?= $this->Html->link(__('<i class="fas fa-plus fa-1x text-gray-300"></i>'), ['controller' => 'plans', 'action' => 'add', $activity->activity_id], ['class' => 'overlay', 'escape' => false, 'title' => 'Add Plan']) ?>
                                </div>
                                <?php foreach ($activePlan as $planactive) : ?>
                                <?php if ($planactive->activity_id ==  $activity->id) : ?>

                                <div class="col-auto">
                                    <?= $this->Html->link(__('<i class="fas fa-eye fa-1x text-gray-300"></i>'), ['controller' => 'plans', 'action' => 'view', $planactive->id], ['class' => 'overlay', 'escape' => false, 'title' => 'View Plan']) ?>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
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
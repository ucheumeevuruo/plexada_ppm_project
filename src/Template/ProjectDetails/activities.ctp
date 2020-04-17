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
?>
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-body">
            <?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i> Edit'), ['action' => 'edit', $projectDetail->id], ['class' => 'btn btn-outline-dark btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>
            <div class="clearfix"></div>
            <br />
            <div class="d-sm-flex align-items-center mb-4" style="padding-top: 20px">
                <h2 class="h3 mb-0 text-gray-800"><?= __('Activities') ?></h2>
            </div>
            <?= $this->Html->link(__('<i class="fa fa-plus fa-sm"></i> Create'), ['controller' => 'activities', 'action' => 'add', $projectDetail->id], ['class' => 'btn btn-outline-dark btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>
            <br />
            <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable" role="grid"
                aria-describedby="dataTable_info">
                <br />
                <thead class="bg-primary">
                    <tr>
                        <th scope="col" class="text-white"><?= __('Activity Name') ?></th>
                        <th scope="col" class="text-white"><?= __('Assigned To') ?></th>
                        <th scope="col" class="text-white"><?= __('Duration') ?></th>
                        <th scope="col" class="text-white"><?= __('Start Date') ?></th>
                        <th scope="col" class="text-white"><?= __('Finish Date') ?></th>
                        <th scope="col" class="text-white"><?= __('Status') ?></th>
                        <th scope="col" class="text-white"><?= __('% complete') ?></th>
                        <th scope="col" class="text-white"><?= __('Milestone') ?></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach (@$projectDetail->activities as $activity) : ?>
                    <tr>
                        <td><?= h($activity->current_activity) ?></td>
                        <td><?= h($activity->system_user_id) ?></td>
                        <td><?= h($activity->current_activity) ?></td>
                        <td><?= h($activity->created) ?></td>
                        <td><?= h($activity->completion_date) ?></td>
                        <td><?= h($activity->status_id) ?></td>
                        <td><?= h($activity->percentage_completion) ?></td>
                        <td><?= h($activity->description) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="content-task"></div>
    <!-- overlayed element -->
    <div id="dialogModal">
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
        $(document).ready(function() {
            $('.dataTable').DataTable();
            $(document).on('click', '#transmit', function(e) {
                e.preventDefault();
                let href = $(this).attr('href');
                $('#content-task').load(href);
            });
        });

    });
    </script>
</div>
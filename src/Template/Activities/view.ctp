<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
//dataTables.bootstrap4.min.css
?>
<div class="container-fluid py-4 border-top white-bg">
    <h3><?= h($activity->subject) ?></h3>
    <div class="row">
        <div class="col" style="max-width: 550px">
            <table class="table table-borderless" style="font-size:14px">
                <tr>
                    <th scope="row"><?= __('Project Name') ?></th>
                    <td><?= $activity->has('project') ? $this->Html->link($activity->project->name, ['controller' => 'Projects', 'action' => 'report', $activity->project->id]) : '' ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Milestone Name') ?></th>
                    <td><?= $activity->has('milestone') ? h($activity->milestone->name) : '' ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Activity Name') ?></th>
                    <td><?= h($activity->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Description') ?></th>
                    <td><?= h($activity->description) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Assigned To') ?></th>
                    <td><?= $activity->has('staff') ? $this->Html->link($activity->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $activity->staff->id]) : '' ?>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td><?= $activity->has('status') ?  h($activity->status->lov_value) : '' ?>
                </tr>
                <tr>
                    <th scope="row"><?= __('Start Date') ?></th>
                    <td><?= h($activity->start_date) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('End Date') ?></th>
                    <td><?= h($activity->end_date) ?></td>
                </tr>
            </table>
        </div>
        <div class="col border-left">
            <div class="px-0 py-4">
                <?= $this->Html->link(__('Create'), ['controller' => 'tasks', 'action' => 'add', $activity->activity_id], ['class' => 'btn btn-info rounded-0 overlay', 'title' => 'Add', 'escape' => false]) ?>
            </div>

            <table class="table table-striped table-responsive table-sm dataTable" role="grid" aria-describedby="dataTable_info">
                <thead class="text-center">
                    <tr>
                        <th class="align-middle" scope="col"><?= __('Task Name') ?></th>
                        <th class="align-middle" scope="col"><?= __('Start Date') ?></th>
                        <th class="align-middle" scope="col"><?= __('End Date') ?></th>
                        <th class="align-middle" scope="col"><?= __('Description') ?></th>
                        <th class="align-middle" scope="col"><?= __('Status') ?></th>
                        <th class="align-middle" scope="col"><?= __('PM Comment') ?></th>
                        <th class="align-middle" scope="col"><?= __('Predecessor') ?></th>
                        <th class="align-middle" scope="col"><?= __('Successor') ?></th>
                        <th class="align-middle" scope="col"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($activity->tasks as $task) : ?>
                        <tr>
                            <td><?= h($task->Task_name) ?></td>
                            <td><?= h($task->Start_date) ?></td>
                            <td><?= h($task->end_date) ?></td>
                            <td><?= h($task->Description) ?></td>
                            <?php if ($task->status_id == 3) { ?>
                                <td><?= h('Close') ?></td>
                            <?php } else { ?>
                                <td><?= h('Open') ?></td>
                            <?php } ?>
                            <td><?= h($task->pm_comment) ?></td>
                            <td><?= h($task->Predecessor) ?></td>
                            <td><?= h($task->Successor) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fas fa-plus fa-sm"></i>'), ['controller' => 'tasks', 'action' => 'pmComment', $task->id], ['class' => 'btn btn-outline-primary btn-sm overlay', 'title' => 'Add comment', 'escape' => false]) ?>
                                <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-sm"></i>'), ['controller' => 'tasks', 'action' => 'edit', $task->id], ['class' => 'btn btn-outline-warning btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__("<i class='fas fa-trash fa-sm'></i>"), ['controller' => 'tasks', 'action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->Task_name), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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
        $(".overlay").click(function(event) {
            event.preventDefault();
            //load content from href of link
            $('#contentWrap .modal-body').load($(this).attr("href"), function() {
                $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content')
                    .removeClass()
                $('#MyModal4').modal('show')
            });
        });
        $('.dataTable').DataTable();
    });
</script>
<?= $this->Html->script('jquery.dataTables.min.js') ?>
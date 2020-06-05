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

    <table class="table fa-border">
        <thead class="text-primary font-weight-bolder">
            <tr>
                <td>S/N</td>
                <td>Name of Plan</td>
                <td>Title of Plan</td>
                <td>Comment</td>
                <td>Plan Type</td>
                <td>Status</td>
                <td>Approved</td>
                <td>Assigned To</td>
                <td>State Date</td>
                <td>End Date</td>
                <td>Actions</td>
                <!-- <td>Created by</td> -->
            </tr>
        </thead>
        <tbody>
            <?php $num = 1; ?>
            <?php foreach ($plans as $plan) : ?>
                <?php if ($plan->activity_id == $id) : ?>
                    <tr>
                        <td><?= h($num++) ?></td>
                        <td><?= h($plan->name) ?></td>
                        <td><?= h($plan->title) ?></td>
                        <td><?= h($plan->comment) ?></td>
                        <td><?= h($plan->plan_type) ?></td>
                        <td><?= h($plan->status) ?></td>
                        <?php if ($plan->approved == 1) { ?>
                            <td><?= h('Yes') ?></td>
                        <?php } else { ?>
                            <td><?= h('No') ?></td>
                        <?php } ?>
                        <?php foreach ($staffs as $staff) : ?>
                            <?php if ($staff->id == $plan->assigned_to_id) : ?>
                                <td><?= h($staff->last_name) ?> <?= h($staff->first_name) ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <td><?= h($plan->start_date) ?></td>
                        <td><?= h($plan->end_date) ?></td>
                        <td class="actions">
                            <!-- <?= $this->Html->link(__('<i class="fa fa-eye fa-lg"></i>'), ['controller' => 'Plans', 'action' => 'view', $plan->id], ['class' => 'overlay text-info', 'title' => 'View', 'escape' => false]) ?> -->

                            <?= $this->Html->link(__('<i class="fa fa-edit fa-lg"></i>'), ['controller' => 'Plans', 'action' => 'edit', $plan->id], ['class' => 'overlay text-warning ml-1', 'title' => 'Edit', 'escape' => false]) ?>

                            <?= $this->Form->postLink(__("<i class='fa fa-trash fa-lg'></i>"), ['controller' => 'Plans', 'action' => 'delete', $plan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plan->id), 'escape' => false, 'class' => 'text-danger ml-1']) ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

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
    $(".overlay").click(function(event) {
        event.preventDefault();
        //load content from href of link
        $('#contentWrap .modal-body').load($(this).attr("href"), function() {
            $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content').removeClass()
            $('#MyModal4').modal('show')
        });
    });
    $(document).ready(function() {
        $('.dataTable').DataTable();
    });
</script>
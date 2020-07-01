<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disbursement[]|\Cake\Collection\CollectionInterface $disbursements
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Disbursement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Milestones'), ['controller' => 'Milestones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Milestone'), ['controller' => 'Milestones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="">
    <h3><?= __('Disbursements') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('disbursement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('milestone_id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('percentage_completion') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('comments') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Disbursed Date') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('end_date') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($disbursements as $disbursement) : ?>
                <tr>
                    <!-- <td><?= $this->Number->format($disbursement->disbursement_id) ?></td>
                <td><?= $disbursement->has('project') ? $this->Html->link($disbursement->project->name, ['controller' => 'Projects', 'action' => 'view', $disbursement->project->id]) : '' ?></td>
                <td><?= $disbursement->has('milestone') ? $this->Html->link($disbursement->milestone->description, ['controller' => 'Milestones', 'action' => 'view', $disbursement->milestone->id]) : '' ?></td> -->
                    <td><?= h($disbursement->name) ?></td>
                    <!-- <td><?= $this->Number->format($disbursement->percentage_completion) ?></td> -->
                    <td></td>
                    <td><?= h($disbursement->start_date) ?></td>
                    <!-- <td><?= h($disbursement->end_date) ?></td> -->
                    <td><?= $this->Number->format($disbursement->cost) ?></td>
                    <!-- <td><?= h($disbursement->created) ?></td> -->
                    <!-- <td><?= h($disbursement->last_updated) ?></td>  -->
                    <!-- <td><?= $disbursement->has('user') ? $this->Html->link($disbursement->user->username, ['controller' => 'Users', 'action' => 'view', $disbursement->user->id]) : '' ?></td> -->
                    <td class="actions">
                        <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $disbursement->disbursement_id]) ?> -->
                        <?= $this->Html->link(__('<i class="fa fa-edit fa-lg"></i>'), ['action' => 'edit', $disbursement->disbursement_id], ['class' => 'overlay text-warning ml-1', 'title' => 'Edit', 'escape' => false]) ?>
                        <?= $this->Form->postLink(__("<i class='fa fa-trash fa-lg'></i>"), ['action' => 'delete', $disbursement->disbursement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $disbursement->disbursement_id), 'escape' => false, 'class' => 'text-danger ml-1']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td>Total</td>
                <td></td>
                <td><?= $this->Number->format($total) ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination p-3">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?php echo str_repeat("&nbsp;", 5); ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

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
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
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <table class="table table-borderless no-border">
                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <td><?= h($projectDetail->name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Description') ?></th>
                            <td><?= h($projectDetail->description) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Donor') ?></th>
                            <td><?= $projectDetail->has('vendor') ? $this->Html->link($projectDetail->vendor->company_name, ['controller' => 'Vendors', 'action' => 'view', $projectDetail->vendor->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Sponsor') ?></th>
                            <td><?= $projectDetail->has('sponsor') ? $this->Html->link($projectDetail->sponsor->full_name, ['controller' => 'Sponsors', 'action' => 'view', $projectDetail->sponsor->id]) : '' ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <table class="table table-borderless no-border">
                        <tr>
                            <th scope="row"><?= __('Current Status') ?></th>
                            <td><?= h($projectDetail->lov->lov_value) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Project Manager') ?></th>
                            <td><?= $projectDetail->has('staff') ? $projectDetail->staff->full_name : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Waiting On') ?></th>
                            <td><?= h($projectDetail->has('personnel') ? $projectDetail->personnel->full_name : '') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Waiting Since') ?></th>
                            <td><?= h($projectDetail->has('personnel') ? $projectDetail->waiting_since : '') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th scope="row"><?= __('Start Date') ?></th>
                            <td><?= h($projectDetail->start_dt) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('End Date') ?></th>
                            <td><?= h($projectDetail->end_dt) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($projectDetail->created) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Last Updated') ?></th>
                            <td><?= h($projectDetail->last_updated) ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="clearfix"></div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <?= $this->Html->link(__('Next Steps'), ['action' => 'view', $projectDetail->id], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#"><?= __('Milestones/Achievements') ?></a>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(__('Risk Issues'), ['action' => 'risk-issues', $projectDetail->id], ['class' => 'nav-link']) ?>
                </li>
            </ul>
            <div class="d-sm-flex align-items-center mb-4" style="padding-top: 20px">
                <h2 class="h3 mb-0 text-gray-800"><?= __('Milestones/Achievements') ?></h2>
            </div>
            <?= $this->Html->link(__('<i class="fa fa-plus fa-sm"></i> Create'), ['controller' => 'milestones', 'action' => 'add', $projectDetail->id], ['class' => 'btn btn-outline-dark btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>
            <br />
            <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable" role="grid" aria-describedby="dataTable_info">
                <br />
                <thead>
                <tr>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Achievement') ?></th>
                    <th scope="col"><?= __('Payment') ?></th>
                    <th scope="col"><?= __('Trigger') ?></th>
                    <th scope="col"><?= __('Status') ?></th>
                    <th scope="col"><?= __('Expected Completion Date') ?></th>
                    <th scope="col"><?= __('Completion Date') ?></th>
                    <th scope="col"><?= __('Amount') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($projectDetail->milestones as $milestone): ?>
                    <tr>
                        <td><?= h($milestone->description) ?></td>
                        <td><?= $milestone->has('achievement') ? $milestone->achievement : ''?></td>
                        <td><?= $milestone->has('payment') && $milestone->payment == 'Y' ? 'Paid' : 'Not Paid'?></td>
                        <td><?= $milestone->has('trigger') ? h($milestone->trigger->lov_value) : '' ?></td>
                        <td><?= h($milestone->lov->lov_value) ?></td>
                        <td><?= h($milestone->expected_completion_date) ?></td>
                        <td><?= h($milestone->completed_date) ?></td>
                        <td><?= $milestone->has('amount') ? $this->NumberFormat->format($milestone->amount, ['before' => '₦']) : '0.00'?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i>'), ['controller' => 'milestones', 'action' => 'edit', $milestone->id], ['escape' => false, 'class' => 'btn btn-outline-warning btn-sm overlay']) ?>
                            <?= $this->Form->postLink(__('<i class="fa fa-trash fa-sm"></i>'), ['controller' => 'milestones', 'action' => 'delete', $milestone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $milestone->activity_id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- overlayed element -->
    <div id="dialogModal">
        <!-- the external content is loaded inside this tag -->
        <div id="contentWrap">
            <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-lg']) ?>
            <?= $this->Modal->body()// No header ?>
            <?= $this->Modal->footer()// Footer with close button (default) ?>
            <?= $this->Modal->end() ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            //respond to click event on anything with 'overlay' class
            $(".overlay").click(function(event){
                event.preventDefault();
                //load content from href of link
                $('#contentWrap .modal-body').load($(this).attr("href"), function(){
                    $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content').removeClass()
                    $('#MyModal4').modal('show')
                });
            });
            $(document).ready(function() {
                $('.dataTable').DataTable();
            } );
        });
    </script>
</div>

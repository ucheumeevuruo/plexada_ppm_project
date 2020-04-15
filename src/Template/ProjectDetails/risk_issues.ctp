<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetails $projectDetail
 * @var \App\Model\Entity\RiskIssues $risk_issues
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
                        <tr>
                            <th scope="row"><?= __('Current Status') ?></th>
                            <td><?= h($projectDetail->lov->lov_value) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Sub Status') ?></th>
                            <td><?= h($projectDetail->has('sub_status') ? $projectDetail->sub_status->lov_value : '') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Priority') ?></th>
                            <td><?= h($projectDetail->has('priority') ? $projectDetail->priority->lov_value : '') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <table class="table table-borderless">

                        <tr>
                            <th scope="row"><?= __('Currency') ?></th>
                            <td><?= $projectDetail->has('price') ? h($projectDetail->price->currency->code) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Budget') ?></th>
                            <td><?= $projectDetail->has('price') ? h($this->NumberFormat->format($projectDetail->price->budget, ['before' => isset($projectDetail->price->currency) ? $projectDetail->price->currency->symbol : ''])) : '0.00' ?></td>
                        </tr>
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
                    <?= $this->Html->link(__('Milestones/Achievements'), ['action' => 'milestones', $projectDetail->id], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#"><?= __('Risk Issues') ?></a>
                </li>
            </ul>
            <div class="d-sm-flex align-items-center mb-4" style="padding-top: 20px">
                <h2 class="h3 mb-0 text-gray-800"><?= __('Risk Issues') ?></h2>
            </div>
            <?= $this->Html->link(__('<i class="fa fa-plus fa-sm"></i> Create'), ['controller' => 'risk-issues', 'action' => 'add', $projectDetail->id], ['class' => 'btn btn-outline-dark btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>
            <br />
            <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable" role="grid" aria-describedby="dataTable_info">
                <br />
                <thead>
                <tr>
                    <th scope="col"><?= __('Record Number') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Assigned To') ?></th>
                    <th scope="col"><?= __('Status') ?></th>
                    <th scope="col"><?= __('Remediation') ?></th>
                    <th scope="col"><?= __('Issue') ?></th>
                    <th scope="col"><?= __('Impact') ?></th>
                    <th scope="col"><?= __('Expected Resolution Date') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($projectDetail->risk_issues as $riskIssue): ?>
                    <tr>
                        <td><?= h($riskIssue->record_number) ?></td>
                        <td><?= h($riskIssue->description) ?></td>
                        <td><?= $riskIssue->has('staff') ? $this->Html->link($riskIssue->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $riskIssue->staff->id]) : '' ?></td>
                        <td><?= $riskIssue->has('lov') ? $this->Html->link($riskIssue->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $riskIssue->lov->id]) : '' ?></td>
                        <td><?= h($riskIssue->remediation) ?></td>

                        <td><?= h($riskIssue->issue) ?></td>
                        <td><?= $riskIssue->has('impact') ? h($riskIssue->impact->lov_value) : '' ?></td>
                        <td><?= h($riskIssue->expected_resolution_date) ?></td>
                        <td><?= h($riskIssue->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i>'), ['controller' => 'risk_issues', 'action' => 'edit', $riskIssue->id], ['escape' => false, 'class' => 'btn btn-outline-warning btn-sm overlay']) ?>
                            <?= $this->Form->postLink(__('<i class="fa fa-trash fa-sm"></i>'), ['controller' => 'risk_issues', 'action' => 'delete', $riskIssue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $riskIssue->activity_id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
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

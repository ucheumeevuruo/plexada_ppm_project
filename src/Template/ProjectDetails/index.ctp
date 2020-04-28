<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail[]|\Cake\Collection\CollectionInterface $projectDetails
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<div class="projectDetails container-fluid">
    <div class="shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-primary br-t">
            <h2 class="text-center text-light font-weight-bold"><?= __('PAD Details') ?></h2>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable table-hover table-primary br-m" role="grid"
                    aria-describedby="dataTable_info" cellpadding="0" cellspacing="0">
                    <thead class="bg-primary br-t">
                        <tr>
                            <th scope="col"><?= __('Project Id') ?></th>
                            <th scope="col"><?= __('Project Name') ?></th>
                            <th scope="col"><?= __('Description') ?></th>
                            <th scope="col"><?= __('Location') ?></th>
                            <th scope="col"><?= __('Manager') ?></th>
                            <th scope="col"><?= __('Status') ?></th>
                            <th scope="col"><?= __('Start date') ?></th>
                            <th scope="col"><?= __('End date') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Funding') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                            <th scope="col" class="actions"><?= __('Add') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projectDetails as $projectDetail) : ?>
                        <?php if ($projectDetail->completed_percent > 80) {
                                $stat = ' <p class="mb-0" style="background-color: #00FF00;"> &nbsp;  </p>';
                            } else if ($projectDetail->completed_percent >= 80 && $projectDetail->completed_percent < 100) {
                                $stat = ' <p class="mb-0" style="background-color: #FFFF00"> &nbsp; </p>';
                            } else if ($projectDetail->completed_percent >= 60 && $projectDetail->completed_percent < 80) {
                                $stat = ' <p class="mb-0" style="background-color: #FFBF00"> &nbsp; </p>';
                            } else {
                                $stat = ' <p class="mb-0" style="background-color: #FF0000"> &nbsp; </p>';
                            }
                            ?>
                        <tr>
                            <td><?= $this->Number->format($projectDetail->id) ?></td>
                            <td><?= h($projectDetail->name) ?></td>
                            <td><?= h($projectDetail->description) ?></td>
                            <td><?= h($projectDetail->location) ?></td>
                            <!-- <td><?= $projectDetail->has('vendor') ? $this->Html->link($projectDetail->vendor->company_name, ['controller' => 'Vendors', 'action' => 'view', $projectDetail->vendor->id]) : '' ?></td> -->
                            <!-- <td><?= $this->Number->format($projectDetail->manager_id) ?></td> -->
                            <td><?= $projectDetail->has('staff') ? $this->Html->link($projectDetail->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $projectDetail->staff->id]) : '' ?>
                            </td>

                            <!-- <td><?= $projectDetail->has('sponsor') ? $this->Html->link($projectDetail->sponsor->full_name, ['controller' => 'Sponsors', 'action' => 'view', $projectDetail->sponsor->id]) : '' ?></td> -->
                            <!-- <td><?= h($projectDetail->waiting_since) ?></td> -->
                            <!-- <td><?= $projectDetail->has('staff') ? $this->Html->link($projectDetail->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $projectDetail->staff->id]) : '' ?></td> -->
                            <!-- <td><?= $this->Number->format($projectDetail->status_id) ?></td> -->
                            <td><?= $this->Html->link(
                                        __($stat),
                                        ['controller' => 'ProjectDetails'],
                                        ['escape' => false, 'class' => 'nav-link collapsed']
                                    ) ?>
                            </td>
                            <td><?= h($projectDetail->start_dt) ?></td>
                            <td><?= h($projectDetail->end_dt) ?></td>
                            <td><?= h($projectDetail->created) ?></td>
                            <!-- <td><?= h($projectDetail->last_updated) ?></td> -->
                            <!-- <td><?= $projectDetail->has('user') ? $this->Html->link($projectDetail->user->username, ['controller' => 'Users', 'action' => 'view', $projectDetail->user->id]) : '' ?></td> -->
                            <!-- <td><?= $projectDetail->has('annotation') ? $this->Html->link($projectDetail->annotation->id, ['controller' => 'Annotations', 'action' => 'view', $projectDetail->annotation->id]) : '' ?></td> -->
                            <!-- <td><?= h($projectDetail->environmental_factors) ?></td> -->
                            <td><?= $this->Number->format($projectDetail->funding) ?></td>
                            <!-- <td><?= $this->Number->format($projectDetail->approvals) ?></td> -->
                            <!-- <td><?= h($projectDetail->risks) ?></td> -->
                            <!-- <td><?= h($projectDetail->components) ?></td> -->
                            <!-- <td><?= $projectDetail->has('price') ? $this->Html->link($projectDetail->price->id, ['controller' => 'Prices', 'action' => 'view', $projectDetail->price->id]) : '' ?></td> -->
                            <!-- <td><?= $this->Number->format($projectDetail->sub_status_id) ?></td> -->
                            <td class="actions ">
                                <?= $this->Html->link(__('<i class="fa fa-pencil fa-lg"></i>'), ['action' => 'edit', $projectDetail->id], ['class' => 'btn btn-outline-primary btn-sm overlay float-left', 'title' => 'Edit', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash-o fa-lg'></i>"), ['action' => 'delete', $projectDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetail->id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm float-left']) ?>
                            </td>
                            <td>
                                <?= $this->Html->link(__('Add Milestones'), ['controller' => 'milestones', 'action' => 'add'], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->

    <!-- MODAL ELEMENTS -->

    <div id="dialogModal" class="bg-primary">
        <!-- the external content is loaded inside this tag -->
        <div id="contentWrap">
            <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-md']) ?>
            <?= $this->Modal->body() // No header 
            ?>
            <?= $this->Modal->footer() // Footer with close button (default) 
            ?>
            <?= $this->Modal->end() ?>
        </div>
        <div id="uploadContent">
            <?= $this->Modal->create(['id' => 'upload', 'size' => 'modal-sm']) ?>
            <?= $this->Modal->body('
                <form>
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Import file</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                </form>
            ') // No header 
            ?>
            <?= $this->Modal->footer() // Footer with close button (default) 
            ?>
            <?= $this->Modal->end() ?>
        </div>
    </div>


    <script>
    $('.dataTable').DataTable();

    //  $(function () {
    //         $('#date, #approvers_date, #start_date, #end_date, #plan_start_date, #plan_end_date, #start_date, #exp_output_date, #date_disbursement').datepicker({
    //             inline: true,
    //             "format": "dd/mm/yyyy",
    //             startDate: "0d",
    //             // "endDate": "09-15-2017",
    //             "keyboardNavigation": false
    //         });
    //     });

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

        $(".upload").click(function(event) {
            event.preventDefault();
            $("#upload").modal('show')
        })
        $('.dataTable').DataTable();
    });
    </script>
</div>
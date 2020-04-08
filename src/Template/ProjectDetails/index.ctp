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
?>
<div class="container-fluid">

<h2 class="text-center text-primary font-weight-bold pb-2"><?= __('Project List') ?></h2>

    <div class=" shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-primary br-t">
            <h3 class="m-0 text-white"><?= __('Add project') ?>
                <div class="btn-group ml-3" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay border-right', 'title' => 'Add', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="fa fa-upload fa-lg"></i>'), ['action' => 'import'], ['class' => 'btn btn-light overlay', 'title' => 'Import File', 'escape' => false]) ?>

                </div>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable table-primary table-hover br-m" role="grid" aria-describedby="dataTable_info">
                    <thead class="bg-primary">
                    <tr>
                        <th scope="col" class="text-white" ><?= __('Name') ?></th>
                        <th scope="col" class="text-white" ><?= __('Description') ?></th>
                        <th scope="col" class="text-white" ><?= __('Project Manager') ?></th>
                        <th scope="col" class="text-white"><?= __('Status') ?></th>
                        <th scope="col" class="text-white"><?= __('Sub Status') ?></th>
                        <th scope="col" class="text-white"><?= __('Priority') ?></th>
                        <th scope="col" class="text-white"><?= __('Budget') ?></th>
                        <th scope="col" class="text-white"><?= __('Start Date') ?></th>
                        <th scope="col" class="text-white"><?= __('End Date') ?></th>
                        <th scope="col" class="text-white"><?= __('Action') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($projectDetails as $projectDetail): ?>
                        <tr>
                            <td><?= $this->Html->link($projectDetail->name, ['controller' => 'ProjectDetails', 'action' => 'view', $projectDetail->id]) ?></td>
                            <td><?= $this->Text->truncate(h($projectDetail->description), 66) ?></td>
                            <td><?= $projectDetail->has('staff') ? h($projectDetail->staff->full_name) : '' ?></td>
                            <td><?= h($projectDetail->lov->lov_value) ?></td>
                            <td><?= $projectDetail->has('sub_status') ? h($projectDetail->sub_status->lov_value) : '' ?></td>
                            <td><?= h($projectDetail->priority->lov_value) ?></td>
                            <td><?= $projectDetail->has('price') ? h($this->NumberFormat->format($projectDetail->price->budget, ['before' => '₦'])) : '&#8358;0' ?></td>
                            <td><?= h($projectDetail->start_dt) ?></td>
                            <td><?= h($projectDetail->end_dt) ?></td>
                            <td class="actions">
                                <?php if(!$projectDetail->has('annotation')) : ?>
                                <?= $this->Html->link(__('<i class="fa fa-list-alt fa-sm"></i>'), ['controller' => 'annotations', 'action' => 'add', $projectDetail->id], ['escape' => false, 'class' => 'btn btn-outline-warning btn-sm overlay']) ?>
                                <?php else : ?>
                                <?= $this->Html->link(__('<i class="fa fa-list-alt fa-sm"></i>'), ['controller' => 'annotations', 'action' => 'edit', $projectDetail->annotation->id], ['escape' => false, 'class' => 'btn btn-outline-warning btn-sm overlay']) ?>
                                <?php endif ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash-o fa-lg'></i>"), ['action' => 'delete', $projectDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetail->id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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
        <div id="uploadContent">
            <?= $this->Modal->create(['id' => 'upload', 'size' => 'modal-sm']) ?>
            <?= $this->Modal->body('
                <form>
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Import file</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                </form>
            ')// No header ?>
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

            $(".upload").click(function (event) {
                event.preventDefault();
                $("#upload").modal('show')
            })
            $('.dataTable').DataTable();
        });
    </script>
</div>

<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectFunding[]|\Cake\Collection\CollectionInterface $projectFundings
 */
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="projectFundings container-fluid">
    <div class="shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-primary br-t">
            <h2 class="text-center text-light font-weight-bold"><?= __('PPF') ?></h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable table-hover table-primary br-m" role="grid"
                    aria-describedby="dataTable_info" cellpadding="0" cellspacing="0">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col"><?= __('Project Name') ?></th>
                            <th scope="col"><?= __('Start Date') ?></th>
                            <th scope="col"><?= __('End Date') ?></th>
                            <th scope="col"><?= __('Currency') ?></th>
                            <th scope="col"><?= __('Funding') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projectFundings as $projectFunding) : ?>
                        <tr>
                            <td>
                                <?= $this->Html->link($projectFunding->project->name, ['controller' => 'Projects', 'action' => 'view', $projectFunding->project->id]) ?>
                            </td>
                            <td>
                                <?= $projectFunding->start_date ?>
                            </td>
                            <td>
                                <?= $projectFunding->end_date ?>
                            </td>
                            <td><?= $projectFunding->has('currency') ? $projectFunding->currency->symbol : '' ?></td>
                            <td>
                                <?= $projectFunding->funding ?>
                            </td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i> Activity'), ['controller' => 'activities', 'action' => 'indexAdd', $projectFunding->project->id, 'activity'], ['class' => 'btn btn-outline-primary btn-sm overlay float-left', 'title' => 'Edit', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__("<i class='fa fa-trash-o fa-lg'></i>"), ['action' => 'delete', $projectFunding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectFunding->id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm float-left']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="paginator">
        <ul class="pagination"> -->
        <!-- <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?> -->
        <!-- </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p> -->
    </div>
    <!-- MODAL ELEMENTS -->

<div id="dialogModal" class="bg-primary">
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
        });


    $('.dataTable').DataTable();
    </script>
</div>
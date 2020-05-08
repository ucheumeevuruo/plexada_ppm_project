<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pim[]|\Cake\Collection\CollectionInterface $pims
 */

$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
// 
?>
<div class="container-fluid">

    <!-- <div class="pims index large-9 medium-8 columns content"> -->
    <h2 class="text-center text-primary font-weight-bold"><?= __('Project') ?></h2>
    <div class="shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-primary br-t">
            <h3 class="m-0 text-white"><?= __('New PIM') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>
                </div>
            </h3>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
            <table cellpadding="0" cellspacing="" class="table table-bordered dataTable table-hover table-primary br-m"
                role="grid" aria-describedby="dataTable_info">
                <thead class="text-light">
                    <tr class="bg-primary">
                        <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                        <th scope="col" class="text-white" width="15%"><?= __('Brief') ?></th>
                        <th scope="col" class="text-white" width="15%"><?= __('Date') ?></th>
                        <th scope="col" class="text-white"><?= __('Funding Agency') ?></th>
                        <th scope="col" class="text-white"><?= __('Signed MOU') ?></th>
                        <th scope="col" class="text-white"><?= __('Adopted Minutes') ?></th>
                        <th scope="col" class="text-white" class="text-white"><?= __('Financial Template') ?></th>
                        <th scope="col" class="text-white"><?= __('Financial Cost') ?></th>

                        <th scope="col" class="actions text-white"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pims as $pim) : ?>
                    <tr>
                        <td><?= $this->Html->link(__(h($pim->brief)), ['action' => 'view', $pim->id]) ?></td>
                        <td><?= h($pim->date->format('d-M-Y')) ?></td>
                        <td><?= h($pim->funding_agency) ?></td>

                        <td><?= h($pim->signed_mou) ?></td>
                        <td><?= h($pim->adopted_minutes) ?></td>

                        <td><?= h($pim->financial_template) ?></td>
                        <td><?= $this->Number->format($pim->financial_cost) ?></td>
                        <td class="actions">
                            <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $pim->id]) ?> -->
                            <?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i>'), ['action' => 'edit', $pim->id], ['escape' => false, 'class' => 'btn btn-outline-primary btn-sm overlay']) ?>
                            <?= $this->Form->postLink(__('<i class="fa fa-trash-o fa-lg"></i>'), ['action' => 'delete', $pim->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pim->id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                        </td>
                        <!-- <td class="">
                            <?= $this->Html->link(__('Add Milestones'), ['controller' => 'Milestones', 'action' => 'add'], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?>
                        </td> -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


        </div>
    </div>
    <!-- </div> -->
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
    <!-- </div> -->


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


    $('.dataTable').DataTable();
    </script>
</div>
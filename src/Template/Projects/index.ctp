<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();

?>

<div class="container-fluid">
    <h2 class="text-center text-primary font-weight-bold"><?= __('Projects') ?></h2>
    <div class="shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-primary br-t">
            <h3 class="m-0 text-white"><?= __('Add Project') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>
                </div>
            </h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable table-hover table-primary br-m" role="grid" aria-describedby="dataTable_info">
                    <thead class="bg-primary br-t">
                        <tr>
                            <!-- <th scope="col" width="15%"><?= __('Id')  ?></th> -->
                            <th scope="col" width="13%"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Introduction') ?></th>
                            <th scope="col"width="15%"><?= __('Location') ?></th>
                            <th scope="col" width="15%"><?= __('Cost') ?></th>
                            <th scope="col" class="actions" width="22%"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): ?>
                        <tr>
                            <!-- <td><?= $this->Number->format($project->id) ?></td> -->
                            <td><?= $this->Html->link($project->name, ['controller' => 'projects', 'action' => 'view', $project->id], ['id' => 'transmit']) ?></td>
                            <td><?= h($project->introduction) ?></td>
                            <td><?= h($project->location) ?></td>
                            <td><?= $this->Number->format($project->cost) ?></td>
                            <td class="actions">
                            <button class="btn btn-small btn-primary">
                                <?= $this->Html->link(__('Add PAD'), ['controller' => 'projectDetails', 'action' => 'add', $project->id], ['class' => 'text-light txt-sm']) ?>
                            </button>
                            <button class="btn btn-small btn-primary">
                                <?= $this->Html->link(__('Add PIM'), ['controller' => 'pims', 'action' => 'add', $project->id], ['class' => 'text-light txt-sm']) ?>
                            </button>
                            <button class="btn btn-small btn-primary">
                                <?= $this->Html->link(__('Add PPF'), ['controller' => 'projectFundings','action' => 'add', $project->projectFunding_id], ['class' => 'text-light txt-sm']) ?>
                            </button>
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
            <?= $this->Paginator->last(__('last') . ' >>') ?>>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->

<script>
 $('.dataTable').DataTable();
 </script>
</div>

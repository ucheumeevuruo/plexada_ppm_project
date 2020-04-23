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
            <h2 class="text-center text-light font-weight-bold"><?= __('Project Fundings') ?></h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable table-hover table-primary br-m" role="grid"
                    aria-describedby="dataTable_info" cellpadding="0" cellspacing="0">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Project Id') ?></th>
                            <th scope="col"><?= __('Milestone') ?></th>
                            <th scope="col"><?= __('Funding') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 0; ?>
                        <?php foreach ($projectFundings as $projectFunding) : ?>
                        <?php $num++; ?>
                        <tr>
                            <!-- <td><?= $this->Number->format($projectFunding->id) ?></td> -->
                            <td style="width:5%"><?= h($num) ?></td>

                            <td><?= $projectFunding->has('milestone') ? $this->Html->link($projectFunding->milestone->id, ['controller' => 'Milestones', 'action' => 'view', $projectFunding->milestone->id]) : '' ?>
                            </td>
                            <td><?= $projectFunding->has('milestone') ? $this->Html->link($projectFunding->milestone->description, ['controller' => 'Milestones', 'action' => 'view', $projectFunding->milestone->id]) : '' ?>
                            </td>
                            <td><?= $this->Number->format($projectFunding->funding) ?></td>
                            <td class="actions">
                                <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $projectFunding->id]) ?> -->
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectFunding->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectFunding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectFunding->id)]) ?>
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
    <script>
    $('.dataTable').DataTable();
    </script>
</div>
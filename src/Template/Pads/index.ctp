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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= __('Pad List') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay', 'title' => 'Add', 'escape' => false]) ?>
                </div>
            </h6>
        </div>
        <div class="pads index large-9 medium-8 columns content table-responsive">
            <h3><?= __('Pads') ?></h3>
            <table cellpadding="0" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                        <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('brief') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('key_players') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('project_type') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('project_target') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('project_details') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('project_amount') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('currency') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('due_date') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('expected_outcome') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('funding_agency') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('conditions') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('objective_sub_category') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pads as $pad) : ?>
                    <tr>
                        <!-- <td><?= $this->Number->format($pad->id) ?></td> -->
                        <td><?= h($pad->date) ?></td>
                        <td><?= h($pad->brief) ?></td>
                        <td><?= h($pad->key_players) ?></td>
                        <td><?= h($pad->project_type) ?></td>
                        <td><?= h($pad->project_target) ?></td>
                        <td><?= h($pad->project_details) ?></td>
                        <td><?= $this->Number->format($pad->project_amount) ?></td>
                        <td><?= h($pad->currency) ?></td>
                        <td><?= h($pad->due_date) ?></td>
                        <td><?= h($pad->expected_outcome) ?></td>
                        <td><?= $this->Number->format($pad->funding_agency) ?></td>
                        <td><?= h($pad->conditions) ?></td>
                        <td><?= h($pad->deadline) ?></td>
                        <td><?= h($pad->objective_sub_category) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $pad->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pad->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pad->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
                </p>
            </div>
        </div>
    </div>
</div>
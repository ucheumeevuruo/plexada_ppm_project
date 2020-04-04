<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailOld[]|\Cake\Collection\CollectionInterface $projectDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sponsors'), ['controller' => 'Sponsors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sponsor'), ['controller' => 'Sponsors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectDetails index large-9 medium-8 columns content">
    <!-- Search form -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"><?= __('Project List') ?></a>

        <!-- Search form -->
        <form class="form-inline md-form form-sm mt-0">
            <div class="input-group mb-0">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-dark" type="button"><i class="fa fa-search fa-lg"></i> </button>
                </div>
                <button class="btn btn-light" type="button"><i class="fa fa-filter fa-lg"></i> </button>
            </div>
        </form>
    </nav>
    <br />
    <?= html_entity_decode($this->Html->link(__('<i class="fa fa-plus fa-sm"></i> Create New'), ['action' => 'add'], ['class' => 'btn btn-outline-dark btn-sm'])) ?>


    <table cellpadding="0" cellspacing="0" style="display: block;overflow-x:auto;">
        <thead>
            <tr>
                <th scope="col" width="15%"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col" width="15%"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col" width="15%"><?= $this->Paginator->sort('manager_id') ?></th>
                <th scope="col" width="13%"><?= $this->Paginator->sort('waiting_on') ?></th>
                <th scope="col" width="13%"><?= $this->Paginator->sort('waiting_since') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('budget') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectDetails as $projectDetail): ?>
            <tr>
                <td><?= $this->Html->link($projectDetail->Name, ['controller' => 'ProjectDetailsOld', 'action' => 'view', $projectDetail->id]) ?></td>
                <td><?= h($projectDetail->Description) ?></td>
                <td><?= $projectDetail->staff->first_name . ' ' . $projectDetail->staff->last_name ?></td>
                <td><?= h($projectDetail->waiting_on) ?></td>
                <td><?= h($projectDetail->waiting_since) ?></td>
                <td><?= h($projectDetail->lov->lov_value) ?></td>
                <td><?= h($projectDetail->price->budget) ?></td>
                <td><?= h($projectDetail->start_dt) ?></td>
                <td><?= h($projectDetail->end_dt) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetail->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

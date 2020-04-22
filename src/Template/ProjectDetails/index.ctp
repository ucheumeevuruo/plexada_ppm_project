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
            <h2 class="text-center text-light font-weight-bold"><?= __('Project Details') ?></h2>
    </div>


    <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered dataTable table-hover table-primary br-m" role="grid" aria-describedby="dataTable_info" cellpadding="0" cellspacing="0">
        <thead class="bg-primary br-t">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Vendor') ?></th>
                <th scope="col"><?= __('Manager') ?></th>
                <th scope="col"><?= __('Sponsor') ?></th>
                <!-- <th scope="col"><?= __('Waiting since') ?></th> -->
                <th scope="col"><?= __('Waiting on') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Priority') ?></th>
                <th scope="col"><?= __('Start date') ?></th>
                <th scope="col"><?= __('End date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <!-- <th scope="col"><?= __('Last updated') ?></th> -->
                <!-- <th scope="col"><?= __('system_user_id') ?></th> -->
                <th scope="col"><?= __('Annotation') ?></th>
                <th scope="col"><?= __('Project') ?></th>
                <th scope="col"><?= __('Environmental factors') ?></th>
                <th scope="col"><?= __('Funding') ?></th>
                <th scope="col"><?= __('Approval') ?></th>
                <th scope="col"><?= __('Risks') ?></th>
                <!-- <th scope="col"><?= __('Components') ?></th> -->
                <th scope="col"><?= __('Price') ?></th>
                <!-- <th scope="col"><?= __('Sub status') ?></th> -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectDetails as $projectDetail): ?>
            <tr>
                <td><?= $this->Number->format($projectDetail->id) ?></td>
                <td><?= h($projectDetail->name) ?></td>
                <td><?= h($projectDetail->description) ?></td>
                <td><?= h($projectDetail->location) ?></td>
                <td><?= $projectDetail->has('vendor') ? $this->Html->link($projectDetail->vendor->company_name, ['controller' => 'Vendors', 'action' => 'view', $projectDetail->vendor->id]) : '' ?></td>
                <td><?= $this->Number->format($projectDetail->manager_id) ?></td>
                <td><?= $projectDetail->has('sponsor') ? $this->Html->link($projectDetail->sponsor->full_name, ['controller' => 'Sponsors', 'action' => 'view', $projectDetail->sponsor->id]) : '' ?></td>
                <!-- <td><?= h($projectDetail->waiting_since) ?></td> -->
                <td><?= $projectDetail->has('staff') ? $this->Html->link($projectDetail->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $projectDetail->staff->id]) : '' ?></td>
                <td><?= $this->Number->format($projectDetail->status_id) ?></td>
                <td><?= $projectDetail->has('lov') ? $this->Html->link($projectDetail->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $projectDetail->lov->id]) : '' ?></td>
                <td><?= h($projectDetail->start_dt) ?></td>
                <td><?= h($projectDetail->end_dt) ?></td>
                <td><?= h($projectDetail->created) ?></td>
                <!-- <td><?= h($projectDetail->last_updated) ?></td> -->
                <!-- <td><?= $projectDetail->has('user') ? $this->Html->link($projectDetail->user->username, ['controller' => 'Users', 'action' => 'view', $projectDetail->user->id]) : '' ?></td> -->
                <td><?= $projectDetail->has('annotation') ? $this->Html->link($projectDetail->annotation->id, ['controller' => 'Annotations', 'action' => 'view', $projectDetail->annotation->id]) : '' ?></td>
                <td><?= $this->Number->format($projectDetail->project_id) ?></td>
                <td><?= h($projectDetail->environmental_factors) ?></td>
                <td><?= $this->Number->format($projectDetail->funding) ?></td>
                <td><?= $this->Number->format($projectDetail->approvals) ?></td>
                <td><?= h($projectDetail->risks) ?></td>
                <!-- <td><?= h($projectDetail->components) ?></td> -->
                <!-- <td><?= $projectDetail->has('price') ? $this->Html->link($projectDetail->price->id, ['controller' => 'Prices', 'action' => 'view', $projectDetail->price->id]) : '' ?></td> -->
                <!-- <td><?= $this->Number->format($projectDetail->sub_status_id) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetail->id)]) ?>
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
    <script>
 $('.dataTable').DataTable();
 </script>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pim[]|\Cake\Collection\CollectionInterface $pims
 */
// echo $
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();


?>
<div class="container-fluid">
<!-- <div class="pims index large-9 medium-8 columns content"> -->
    <h2 class="text-center text-primary font-weight-bold"><?= __('PIM List') ?></h2>

    <div class="shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-primary br-t">
            <h3 class="m-0 text-white"><?= __('Add New PIM') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>
                </div>
            </h3>
        </div>
    <div class="card-body">
    <div class="table-responsive">
    <table cellpadding="0" cellspacing="" class="table table-bordered dataTable table-hover table-primary br-m" role="grid" aria-describedby="dataTable_info">
        <thead class="">
            <tr class="bg-primary">
                <!-- <th scope="col" class="text-white"><?= __('id') ?></th> -->
                <th scope="col" class="text-light"><?= __('Date') ?></th>
                <th scope="col" class="text-light"><?= __('Drief') ?></th>
                <th scope="col" class="text-light"><?= __('Funding Agency') ?></th>
                <th scope="col" class="text-light"><?= __('Activities Achievement') ?></th>
                <th scope="col" class="text-light"><?= __('Risks Mitigation') ?></th>
                <th scope="col" class="text-light"><?= __('Activity Next Semester') ?></th>
                <th scope="col" class="text-light"><?= __('Total Expenditure') ?></th>
                <th scope="col" class="text-light"><?= __('Oversight Level') ?></th>
                <th scope="col" class="text-light"><?= __('Oversight_Agency_MDA') ?></th>
                <th scope="col" class="text-light"><?= __('MDA') ?></th>
                <th scope="col" class="text-light"><?= __('Rev. Commitee Rep. Information') ?></th>
                <th scope="col" class="text-light"><?= __('Approvers Agency') ?></th>
                <th scope="col" class="text-light"><?= __('approvers_rep_information') ?></th>
                <th scope="col" class="text-light"><?= __('approvers_date') ?></th>
                <th scope="col" class="text-light"><?= __('signed_mou') ?></th>
                <th scope="col" class="text-light"><?= __('adopted_minutes') ?></th>
                <th scope="col" class="text-light"><?= __('financial_management') ?></th>
                <th scope="col" class="text-light"><?= __('financial_template') ?></th>
                <th scope="col" class="text-light"><?= __('parties') ?></th>
                <th scope="col" class="text-light"><?= __('responsibilities') ?></th>
                <th scope="col" class="text-light"><?= __('start_date') ?></th>
                <th scope="col" class="text-light"><?= __('end_date') ?></th>
                <th scope="col" class="text-light"><?= __('financial_cost') ?></th>
                <th scope="col" class="text-light"><?= __('targets') ?></th>
                <th scope="col" class="text-light"><?= __('activities') ?></th>
                <th scope="col" class="text-light"><?= __('action') ?></th>
                <th scope="col" class="text-light"><?= __('responsible_party') ?></th>
                <th scope="col" class="text-light"><?= __('plan_start_date') ?></th>
                <th scope="col" class="text-light"><?= __('plan_end_date') ?></th>
                <th scope="col" class="text-light"><?= __('dependency') ?></th>
                <th scope="col" class="text-light"><?= __('category') ?></th>
                <th scope="col" class="text-light"><?= __('owner') ?></th>
                <th scope="col" class="text-light"><?= __('currency') ?></th>
                <th scope="col" class="text-light"><?= __('disbursed_amount') ?></th>
                <th scope="col" class="text-light"><?= __('exp_output_date') ?></th>
                <th scope="col" class="text-light"><?= __('task') ?></th>
                <th scope="col" class="text-light"><?= __('progress_category') ?></th>
                <th scope="col" class="text-light"><?= __('progress_currency') ?></th>
                <th scope="col" class="text-light"><?= __('amount_credit_allocation') ?></th>
                <th scope="col" class="text-light"><?= __('disbursed_current_semester') ?></th>
                <th scope="col" class="text-light"><?= __('date_disbursement') ?></th>
                <th scope="col" class="text-light"><?= __('cumulated_disbursment') ?></th>
                <th scope="col" class="text-light" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pims as $pim): ?>
            <tr>
                <!-- <td><?= $this->Number->format($pim->id) ?></td> -->
                <td><?= h($pim->date) ?></td>
                <td><?= h($pim->brief) ?></td>
                <td><?= h($pim->funding_agency) ?></td>
                <td><?= h($pim->activities_achievement) ?></td>
                <td><?= h($pim->risks_mitigation) ?></td>
                <td><?= h($pim->activity_next_semester) ?></td>
                <td><?= $this->Number->format($pim->total_expenditure) ?></td>
                <td><?= h($pim->oversight_level) ?></td>
                <td><?= h($pim->oversight_agency_mda) ?></td>
                <td><?= h($pim->mda) ?></td>
                <td><?= h($pim->rev_commitee_rep_information) ?></td>
                <td><?= h($pim->approvers_agency) ?></td>
                <td><?= h($pim->approvers_rep_information) ?></td>
                <td><?= h($pim->approvers_date) ?></td>
                <td><?= h($pim->signed_mou) ?></td>
                <td><?= h($pim->adopted_minutes) ?></td>
                <td><?= h($pim->financial_management) ?></td>
                <td><?= h($pim->financial_template) ?></td>
                <td><?= h($pim->parties) ?></td>
                <td><?= h($pim->responsibilities) ?></td>
                <td><?= h($pim->start_date) ?></td>
                <td><?= h($pim->end_date) ?></td>
                <td><?= $this->Number->format($pim->financial_cost) ?></td>
                <td><?= h($pim->targets) ?></td>
                <td><?= h($pim->activities) ?></td>
                <td><?= h($pim->action) ?></td>
                <td><?= h($pim->responsible_party) ?></td>
                <td><?= h($pim->plan_start_date) ?></td>
                <td><?= h($pim->plan_end_date) ?></td>
                <td><?= h($pim->dependency) ?></td>
                <td><?= h($pim->category) ?></td>
                <td><?= h($pim->owner) ?></td>
                <td><?= h($pim->currency) ?></td>
                <td><?= $this->Number->format($pim->disbursed_amount) ?></td>
                <td><?= h($pim->exp_output_date) ?></td>
                <td><?= h($pim->task) ?></td>
                <td><?= h($pim->progress_category) ?></td>
                <td><?= h($pim->progress_currency) ?></td>
                <td><?= $this->Number->format($pim->amount_credit_allocation) ?></td>
                <td><?= h($pim->disbursed_current_semester) ?></td>
                <td><?= h($pim->date_disbursement) ?></td>
                <td><?= h($pim->cumulated_disbursment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pim->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pim->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pim->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pim->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
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
<script>
 $('.dataTable').DataTable();
 </script>
</div>

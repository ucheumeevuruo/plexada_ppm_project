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
    <div class="shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-primary br-t">
            <h2 class="text-center text-light font-weight-bold"><?= __('Project Implementation List') ?></h2>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="" class="table table-bordered dataTable table-hover table-primary br-m" role="grid" aria-describedby="dataTable_info">
                    <thead class="text-light">
                        <tr class="bg-primary">
                            <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                            <th scope="col" class="text-white" width="15%"><?= __('Brief') ?></th>
                            <th scope="col" class="text-white" width="15%"><?= __('Date') ?></th>
                            <th scope="col" class="text-white" ><?= __('Funding Agency') ?></th>
                            <!-- <th scope="col" class="text-white"><?= $this->Paginator->sort('activities_achievement') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('risks_mitigation') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('activity_next_semester') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('total_expenditure') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('oversight_level') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('oversight_agency_mda') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('mda') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('rev_commitee_rep_information') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('approvers_agency') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('approvers_rep_information') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('approvers_date') ?></th> -->
                            <th scope="col" class="text-white"><?= __('Signed MOU') ?></th>
                            <th scope="col" class="text-white"><?= __('Adopted Minutes') ?></th>
                            <!-- <th scope="col" class="text-white"><?= $this->Paginator->sort('financial_management') ?></th> -->
                            <th scope="col" class="text-white" class="text-white"><?= __('Financial Template') ?></th>
                        <!--  <th scope="col" class="text-white"><?= $this->Paginator->sort('parties') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('responsibilities') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('start_date') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('end_date') ?></th>  -->
                            <th scope="col" class="text-white"><?= __('Financial Cost') ?></th>
                            <!-- <th scope="col" class="text-white"><?= __('targets') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('Activities') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('action') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('responsible_party') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('plan_start_date') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('plan_end_date') ?></th> -->
                            <!-- <th scope="col" class="text-white"><?= $this->Paginator->sort('dependency') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('category') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('owner') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('currency') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('disbursed_amount') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('exp_output_date') ?></th> -->
                            <!-- <th scope="col" class="text-white"><?= $this->Paginator->sort('task') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('progress_category') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('progress_currency') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('amount_credit_allocation') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('disbursed_current_semester') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('date_disbursement') ?></th>
                            <th scope="col" class="text-white"><?= $this->Paginator->sort('cumulated_disbursment') ?></th> -->
                            <th scope="col" class="actions text-white"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pims as $pim): ?>
                        <tr>
                            <!-- <td><?= $this->Number->format($pim->id) ?></td> -->
                            <td><?= $this->Html->link(__(h($pim->brief)), ['action' => 'view', $pim->id]) ?></td>
                            <td><?= h($pim->date->format('d-M-Y')) ?></td>
                            <td><?= h($pim->funding_agency) ?></td>
                            <!-- <td><?= h($pim->activities_achievement) ?></td>
                            <td><?= h($pim->risks_mitigation) ?></td>
                            <td><?= h($pim->activity_next_semester) ?></td>
                            <td><?= $this->Number->format($pim->total_expenditure) ?></td>
                            <td><?= h($pim->oversight_level) ?></td>
                            <td><?= h($pim->oversight_agency_mda) ?></td>
                            <td><?= h($pim->mda) ?></td>
                            <td><?= h($pim->rev_commitee_rep_information) ?></td>
                            <td><?= h($pim->approvers_agency) ?></td>
                            <td><?= h($pim->approvers_rep_information) ?></td>
                            <td><?= h($pim->approvers_date->format('d-M-Y')) ?></td> -->
                            <td><?= h($pim->signed_mou) ?></td>
                            <td><?= h($pim->adopted_minutes) ?></td>
                            <!-- <td><?= h($pim->financial_management) ?></td> -->
                            <td><?= h($pim->financial_template) ?></td>
                            <!--<td><?= h($pim->parties) ?></td>
                            <td><?= h($pim->responsibilities) ?></td>
                            <td><?= h($pim->start_date->format('d-M-Y')) ?></td>
                            <td><?= h($pim->end_date->format('d-M-Y')) ?></td> -->
                            <td><?= $this->Number->format($pim->financial_cost) ?></td>
                            <!-- <td><?= h($pim->targets) ?></td>
                            <td><?= h($pim->activities) ?></td>
                            <td><?= h($pim->action) ?></td>
                            <td><?= h($pim->responsible_party) ?></td>
                            <td><?= h($pim->plan_start_date->format('d-M-Y')) ?></td>
                            <td><?= h($pim->plan_end_date->format('d-M-Y')) ?></td>  -->
                            <!-- <td><?= h($pim->dependency) ?></td>
                            <td><?= h($pim->category) ?></td>
                            <td><?= h($pim->owner) ?></td>
                            <td><?= h($pim->currency) ?></td></td>
                            <td><?= $this->Number->format($pim->disbursed_amount) ?>
                            <td><?= h($pim->exp_output_date->format('d-M-Y')) ?></td> -->
                            <!-- <td><?= h($pim->task) ?></td>
                            <td><?= h($pim->progress_category) ?></td>
                            <td><?= h($pim->progress_currency) ?></td>
                            <td><?= $this->Number->format($pim->amount_credit_allocation) ?></td>
                            <td><?= h($pim->disbursed_current_semester) ?></td>
                            <td><?= h($pim->date_disbursement->format('d-M-Y')) ?></td>
                            <td><?= h($pim->cumulated_disbursment) ?></td> -->
                            <td class="actions">
                                <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $pim->id]) ?> -->
                                <?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i>'), ['action' => 'edit', $pim->id], ['escape' => false, 'class' => 'btn btn-outline-light btn-sm overlay']) ?>
                                <?= $this->Form->postLink(__('<i class="fa fa-trash-o fa-lg"></i>'), ['action' => 'delete', $pim->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pim->id),'escape' => false, 'class' => 'btn btn-outline-light btn-sm']) ?>
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
<!-- </div> -->
<script>
 $('.dataTable').DataTable();
 </script>
</div>

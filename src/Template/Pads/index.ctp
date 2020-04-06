<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pad[]|\Cake\Collection\CollectionInterface $pads
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pads index large-9 medium-8 columns content">
    <h3><?= __('Pads') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
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
                <th scope="col"><?= $this->Paginator->sort('heirarchy_of_objectiv') ?></th>
                <th scope="col"><?= $this->Paginator->sort('objective_sub_category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specific_oobjective') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_oindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('second_oindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('third_oindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('forth_oindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fifth_oindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sixth_oindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('m_e_omethod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('critical_oassumptions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specific_aobjective') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_aindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('second_aindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('third_aindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('forth_aindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fifth_aindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sixth_aindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('m_e_amethod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('critical_aassumptions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specific_mobjectives') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_mindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('second_mindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('third_mindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('forth_mindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fifth_mindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sixth_mindicator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('m_e_mmethod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('critical_massumptions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_upload') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pads as $pad): ?>
            <tr>
                <td><?= $this->Number->format($pad->id) ?></td>
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
                <td><?= h($pad->heirarchy_of_objectiv) ?></td>
                <td><?= h($pad->objective_sub_category) ?></td>
                <td><?= h($pad->specific_oobjective) ?></td>
                <td><?= h($pad->first_oindicator) ?></td>
                <td><?= h($pad->second_oindicator) ?></td>
                <td><?= h($pad->third_oindicator) ?></td>
                <td><?= h($pad->forth_oindicator) ?></td>
                <td><?= h($pad->fifth_oindicator) ?></td>
                <td><?= h($pad->sixth_oindicator) ?></td>
                <td><?= h($pad->m_e_omethod) ?></td>
                <td><?= h($pad->critical_oassumptions) ?></td>
                <td><?= h($pad->specific_aobjective) ?></td>
                <td><?= h($pad->first_aindicator) ?></td>
                <td><?= h($pad->second_aindicator) ?></td>
                <td><?= h($pad->third_aindicator) ?></td>
                <td><?= h($pad->forth_aindicator) ?></td>
                <td><?= h($pad->fifth_aindicator) ?></td>
                <td><?= h($pad->sixth_aindicator) ?></td>
                <td><?= h($pad->m_e_amethod) ?></td>
                <td><?= h($pad->critical_aassumptions) ?></td>
                <td><?= h($pad->specific_mobjectives) ?></td>
                <td><?= h($pad->first_mindicator) ?></td>
                <td><?= h($pad->second_mindicator) ?></td>
                <td><?= h($pad->third_mindicator) ?></td>
                <td><?= h($pad->forth_mindicator) ?></td>
                <td><?= h($pad->fifth_mindicator) ?></td>
                <td><?= h($pad->sixth_mindicator) ?></td>
                <td><?= h($pad->m_e_mmethod) ?></td>
                <td><?= h($pad->critical_massumptions) ?></td>
                <td><?= h($pad->file_upload) ?></td>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

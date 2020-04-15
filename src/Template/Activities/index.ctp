<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity[]|\Cake\Collection\CollectionInterface $activities
 */
?>
<div class="activities container-fluid">
    <h3><?= __('Activities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('activity_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_activity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waiting_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waiting_since') ?></th>
                <th scope="col"><?= $this->Paginator->sort('next_activity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assigned_to_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('percentage_completion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('system_user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activities as $activity) : ?>
            <tr>
                <td><?= $this->Number->format($activity->activity_id) ?></td>
                <td><?= $activity->has('project_detail') ? $this->Html->link($activity->project_detail->id, ['controller' => 'ProjectDetailsOld', 'action' => 'view', $activity->project_detail->id]) : '' ?>
                </td>
                <td><?= h($activity->current_activity) ?></td>
                <td><?= h($activity->waiting_on) ?></td>
                <td><?= h($activity->waiting_since) ?></td>
                <td><?= h($activity->next_activity) ?></td>
                <td><?= $activity->has('staff') ? $this->Html->link($activity->staff->id, ['controller' => 'Staff', 'action' => 'view', $activity->staff->id]) : '' ?>
                </td>
                <td><?= $this->Number->format($activity->percentage_completion) ?></td>
                <td><?= h($activity->description) ?></td>
                <td><?= $activity->has('lov') ? $this->Html->link($activity->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $activity->lov->id]) : '' ?>
                </td>
                <td><?= h($activity->created) ?></td>
                <td><?= h($activity->last_updated) ?></td>
                <td><?= $activity->has('user') ? $this->Html->link($activity->user->id, ['controller' => 'Users', 'action' => 'view', $activity->user->id]) : '' ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $activity->activity_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->activity_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->activity_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->activity_id)]) ?>
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
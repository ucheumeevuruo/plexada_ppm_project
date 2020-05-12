<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Objective[]|\Cake\Collection\CollectionInterface $objectives
 */
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="objectives index large-9 medium-8 columns content">
    <h3><?= __('Objectives') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('objective') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($objectives as $objective): ?>
            <tr>
                <td><?= $this->Number->format($objective->id) ?></td>
                <td><?= $objective->has('project') ? $this->Html->link($objective->project->name, ['controller' => 'Projects', 'action' => 'view', $objective->project->id]) : '' ?></td>
                <td><?= h($objective->objective) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $objective->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $objective->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $objective->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objective->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Annotation[]|\Cake\Collection\CollectionInterface $annotations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Annotation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="annotations index large-9 medium-8 columns content">
    <h3><?= __('Annotations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($annotations as $annotation): ?>
            <tr>
                <td><?= $this->Number->format($annotation->id) ?></td>
                <td><?= $this->Number->format($annotation->project_id) ?></td>
                <td><?= h($annotation->comment) ?></td>
                <td><?= h($annotation->created) ?></td>
                <td><?= h($annotation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $annotation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $annotation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $annotation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $annotation->id)]) ?>
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

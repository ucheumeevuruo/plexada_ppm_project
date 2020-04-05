<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimMda $pimMda
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim Mda'), ['action' => 'edit', $pimMda->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim Mda'), ['action' => 'delete', $pimMda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimMda->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pim Mdas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Mda'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pimMdas view large-9 medium-8 columns content">
    <h3><?= h($pimMda->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mda') ?></th>
            <td><?= h($pimMda->mda) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Revision Committee Rep Information') ?></th>
            <td><?= h($pimMda->revision_committee_rep_information) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pimMda->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pims') ?></h4>
        <?php if (!empty($pimMda->pims)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pim Approval Id') ?></th>
                <th scope="col"><?= __('Pim Category Id') ?></th>
                <th scope="col"><?= __('Pim Mda Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Brief') ?></th>
                <th scope="col"><?= __('Funding Agency') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pimMda->pims as $pims): ?>
            <tr>
                <td><?= h($pims->id) ?></td>
                <td><?= h($pims->pim_approval_id) ?></td>
                <td><?= h($pims->pim_category_id) ?></td>
                <td><?= h($pims->pim_mda_id) ?></td>
                <td><?= h($pims->date) ?></td>
                <td><?= h($pims->brief) ?></td>
                <td><?= h($pims->funding_agency) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pims', 'action' => 'view', $pims->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pims', 'action' => 'edit', $pims->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pims', 'action' => 'delete', $pims->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pims->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

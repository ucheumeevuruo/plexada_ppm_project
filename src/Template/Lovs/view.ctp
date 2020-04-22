<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lov $lov
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lov'), ['action' => 'edit', $lov->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lov'), ['action' => 'delete', $lov->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lov->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lovs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lov'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lovs view large-9 medium-8 columns content">
    <h3><?= h($lov->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Lov Type') ?></th>
            <td><?= h($lov->lov_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lov Value') ?></th>
            <td><?= h($lov->lov_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('System User Id') ?></th>
            <td><?= h($lov->system_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lov->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($lov->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Updated') ?></th>
            <td><?= h($lov->last_updated) ?></td>
        </tr>
    </table>
</div>

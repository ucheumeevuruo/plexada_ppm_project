<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadCreditFacilityAgreement $padCreditFacilityAgreement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pad Credit Facility Agreement'), ['action' => 'edit', $padCreditFacilityAgreement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pad Credit Facility Agreement'), ['action' => 'delete', $padCreditFacilityAgreement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $padCreditFacilityAgreement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pad Credit Facility Agreements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad Credit Facility Agreement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="padCreditFacilityAgreements view large-9 medium-8 columns content">
    <h3><?= h($padCreditFacilityAgreement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pad') ?></th>
            <td><?= $padCreditFacilityAgreement->has('pad') ? $this->Html->link($padCreditFacilityAgreement->pad->id, ['controller' => 'Pads', 'action' => 'view', $padCreditFacilityAgreement->pad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funding Agency') ?></th>
            <td><?= h($padCreditFacilityAgreement->funding_agency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conditions') ?></th>
            <td><?= h($padCreditFacilityAgreement->conditions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($padCreditFacilityAgreement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($padCreditFacilityAgreement->deadline) ?></td>
        </tr>
    </table>
</div>

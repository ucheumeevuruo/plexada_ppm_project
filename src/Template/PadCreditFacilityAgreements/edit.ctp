<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadCreditFacilityAgreement $padCreditFacilityAgreement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $padCreditFacilityAgreement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $padCreditFacilityAgreement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pad Credit Facility Agreements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padCreditFacilityAgreements form large-9 medium-8 columns content">
    <?= $this->Form->create($padCreditFacilityAgreement) ?>
    <fieldset>
        <legend><?= __('Edit Pad Credit Facility Agreement') ?></legend>
        <?php
            echo $this->Form->control('pad_id', ['options' => $pads]);
            echo $this->Form->control('funding_agency');
            echo $this->Form->control('conditions');
            echo $this->Form->control('deadline');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

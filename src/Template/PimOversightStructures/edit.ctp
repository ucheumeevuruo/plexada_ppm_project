<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimOversightStructure $pimOversightStructure
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pimOversightStructure->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pimOversightStructure->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pim Oversight Structures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimOversightStructures form large-9 medium-8 columns content">
    <?= $this->Form->create($pimOversightStructure) ?>
    <fieldset>
        <legend><?= __('Edit Pim Oversight Structure') ?></legend>
        <?php
            echo $this->Form->control('pim_id', ['options' => $pims]);
            echo $this->Form->control('oversight_level');
            echo $this->Form->control('oversight_agency_mda');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

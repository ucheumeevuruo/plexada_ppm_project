<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimMda $pimMda
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pimMda->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pimMda->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pim Mdas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimMdas form large-9 medium-8 columns content">
    <?= $this->Form->create($pimMda) ?>
    <fieldset>
        <legend><?= __('Edit Pim Mda') ?></legend>
        <?php
            echo $this->Form->control('mda');
            echo $this->Form->control('revision_committee_rep_information');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

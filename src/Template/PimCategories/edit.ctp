<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimCategory $pimCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pimCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pimCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pim Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($pimCategory) ?>
    <fieldset>
        <legend><?= __('Edit Pim Category') ?></legend>
        <?php
            echo $this->Form->control('category');
            echo $this->Form->control('owner');
            echo $this->Form->control('currency');
            echo $this->Form->control('disbursed_amount');
            echo $this->Form->control('expected_output_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

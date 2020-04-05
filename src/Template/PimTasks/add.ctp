<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimTask $pimTask
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pim Tasks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pimTasks form large-9 medium-8 columns content">
    <?= $this->Form->create($pimTask) ?>
    <fieldset>
        <legend><?= __('Add Pim Task') ?></legend>
        <?php
            echo $this->Form->control('task');
            echo $this->Form->control('pim_id', ['options' => $pims]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

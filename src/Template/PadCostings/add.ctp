<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadCosting $padCosting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pad Costings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padCostings form large-9 medium-8 columns content">
    <?= $this->Form->create($padCosting) ?>
    <fieldset>
        <legend><?= __('Add Pad Costing') ?></legend>
        <?php
            echo $this->Form->control('pad_id', ['options' => $pads]);
            echo $this->Form->control('project_amount');
            echo $this->Form->control('currency');
            echo $this->Form->control('due_date');
            echo $this->Form->control('expected_outcome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

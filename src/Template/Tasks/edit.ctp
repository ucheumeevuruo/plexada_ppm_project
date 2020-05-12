<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rask $task
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend><?= __('Edit Task') ?></legend>
        <?php
        echo $this->Form->control('Name');
        echo $this->Form->control('Start Date');
        echo $this->Form->control('Description');
        echo $this->Form->control('Predecessor');
        echo $this->Form->control('Successor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plan $plan
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="plans form large-9 medium-8 columns content">
    <?= $this->Form->create($plan) ?>
    <fieldset>
        <legend><?= __('Add Plan') ?></legend>
        <?php
        echo $this->Form->control('activity_id', ['options' => $activities]);
        echo $this->Form->control('name');
        echo $this->Form->control('start_date', ['empty' => true]);
        echo $this->Form->control('end_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
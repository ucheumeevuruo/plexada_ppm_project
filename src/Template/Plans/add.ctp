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
        echo $this->Form->control('title');
        echo $this->Form->control('comment', ['type' => 'textArea']);
        echo $this->Form->control('plan_type', ['options' => [
            'Inspection' => 'Inspection', 'Assessment' => 'Assessment', 'Evaluation' => 'Evaluation'
        ]]);
        echo $this->Form->control('assigned_to_id', ['options' => $staff]);
        echo $this->Form->control('users_id', ['options' => $user]);
        echo $this->Form->control('start_date', ['empty' => true]);
        echo $this->Form->control('end_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
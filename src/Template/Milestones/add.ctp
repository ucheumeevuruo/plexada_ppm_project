<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milestone $milestone
 */
?>

<div class="milestones container">
    <?= $this->Form->create($milestone) ?>
    <fieldset>
        <legend class="text-primary text-center"><?= __('Add Milestone') ?></legend>
        <?php
            echo $this->Form->control('record_number');
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('amount');
            echo $this->Form->control('payment');
            echo $this->Form->control('status_id', ['options' => $lov]);
            echo $this->Form->control('description');
            echo $this->Form->control('achievement');
            echo $this->Form->control('trigger_id', ['options' => $triggers, 'empty' => true]);
            echo $this->Form->control('completed_date', ['empty' => true]);
            echo $this->Form->control('expected_completion_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

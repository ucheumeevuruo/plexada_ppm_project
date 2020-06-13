<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agreement $agreement
 */
?>
<div class="agreements form large-9 medium-8 columns content">
    <?= $this->Form->create($agreement) ?>
    <fieldset>
        <legend><?= __('Edit Agreement') ?></legend>
        <?php echo $this->Form->control('project_id', ['options' => $projects]);?>
        <?php echo $this->Form->control('approved', ['options' => ['Y' => 'Yes', 'N' => 'No']]); ?>
        <?php echo $this->Form->control('completed_date', ['empty' => true]);?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
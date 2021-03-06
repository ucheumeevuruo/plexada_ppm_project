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
        <?php
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('sponsor');
            echo $this->Form->control('donor');
            echo $this->Form->control('mda');
            echo $this->Form->control('approved');
            echo $this->Form->control('completed_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

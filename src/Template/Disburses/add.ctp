<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disburse $disburse
 */
?>

<div class="disburses form large-9 medium-8 columns content">
    <?= $this->Form->create($disburse) ?>
    <fieldset>
        <legend><?= __('Add Disburse') ?></legend>
        <?php
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('source_of_funding', ['options' => $sponsors]);
            echo $this->Form->control('amount');
            echo $this->Form->control('date');
            echo $this->Form->control('description');
            echo $this->Form->hidden('system_user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Approval $approval
 */
?>

<div class="approvals form large-9 medium-8 columns content">
    <?= $this->Form->create($approval) ?>
    <fieldset>
        <legend class="text-center"><?= __('Approve Design') ?></legend>
        <?php
        echo $this->Form->hidden('project_id', ['options' => $projects]);
        echo $this->Form->control('design_approval', ['options' => ['Y' => 'Yes', 'N' => 'No']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
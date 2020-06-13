<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Approval $approval
 */
?>

<div class="approvals form large-9 medium-8 columns content">
    <?= $this->Form->create($approval) ?>
    <fieldset>
        <legend><?= __('Edit Approval') ?></legend>
        <?php
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('project_approval');
            echo $this->Form->control('design_approval');
            echo $this->Form->control('documents_approval');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

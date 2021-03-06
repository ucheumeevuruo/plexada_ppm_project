<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agreement $agreement
 */
?>

<div class="agreements form large-9 medium-8 columns content">
    <?= $this->Form->create($agreement) ?>
    <fieldset>
        <legend><?= __('Add Agreement') ?></legend>
        <label class="control-label font-weight-bolder">Project</label>
        <?php echo $this->Form->control('project_id', ['label' => false], ['options' => $projects]); ?>
        <label class="control-label font-weight-bolder" for="document_type">Sponsor's Agreements</label>
        <?php echo $this->Form->control('sponsor', ['type' => 'file', 'label' => false]); ?>
        <label class="control-label font-weight-bolder" for="document_type">Donor's Agreements</label>
        <?php echo $this->Form->control('donor', ['type' => 'file', 'label' => false]); ?>
        <label class="control-label font-weight-bolder" for="document_type">MDA's Agreements</label>
        <?php echo $this->Form->control('mda', ['type' => 'file', 'label' => false]); ?>
        <?php echo $this->Form->hidden('approved', ['options' => ['Y' => 'Yes', 'N' => 'No']]); ?>
        <?php echo $this->Form->control('completed_date'); ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
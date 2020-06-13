<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agreement $agreement
 */
?>

<div class="agreements form large-9 medium-8 columns content">
    <?= $this->Form->create($agreement) ?>
    <fieldset>
        <legend class="text-center"><?= __('Add / Edit Agreement Documents') ?></legend>
        <!-- <label class="control-label font-weight-bolder">Project</label> -->
        <?php echo $this->Form->hidden('project_id', ['label' => false], ['options' => $projects]); ?>
        <label class="control-label font-weight-bolder" for="sponsor_agreement">Sponsor's Agreements</label>
        <?php echo $this->Form->control('sponsor_agreement', ['type' => 'file', 'label' => false]); ?>
        <label class="control-label font-weight-bolder" for="donor_agreement">Donor's Agreements</label>
        <?php echo $this->Form->control('donor_agreement', ['type' => 'file', 'label' => false]); ?>
        <label class="control-label font-weight-bolder" for="mda_agreement">MDA's Agreements</label>
        <?php echo $this->Form->control('mda_agreement', ['type' => 'file', 'label' => false]); ?>
        <label class="control-label font-weight-bolder" for="other_documents">Other documents</label>
        <?php echo $this->Form->control('other_documents', ['type' => 'file', 'label' => false]); ?>
        <?php echo $this->Form->hidden('approve_documents', ['options' => ['Y' => 'Yes', 'N' => 'No']]); ?>
        <?php echo $this->Form->hidden('approve_project', ['options' => ['Y' => 'Yes', 'N' => 'No']]); ?>
        <?php echo $this->Form->control('completed_date', ['empty' => true]); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
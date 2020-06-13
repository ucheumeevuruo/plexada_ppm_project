<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponsor $sponsor
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="sponsors form large-9 medium-8 columns content">
    <?= $this->Form->create($sponsor) ?>
    <fieldset>
        <legend class="text-center"><?= __('Add') ?></legend>
        <legend class="text-center"><?= __('Sponsor / Donor / MDA') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('last_name', ['label' => ['class' => 'mandatory', 'text' => 'Last Name / Organizational Name']]); ?>
                <?= $this->Form->control('first_name', ['label' => ['class' => 'mandatory', 'text' => 'Last Name / Organizational Othername']]); ?>
                <?= $this->Form->control('other_names', ['label' => 'Other Names / Organization Contact Person']); ?>
                <?= $this->Form->control('email', ['label' => ['class' => 'mandatory']]); ?>
                <?= $this->Form->control('sponsor_type_id', ['label' => ['class' => 'mandatory']]); ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('address', ['type' => 'textarea']); ?>
                <?= $this->Form->control('state'); ?>
                <?= $this->Form->control('country'); ?>
                <?= $this->Form->control('phone_no'); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

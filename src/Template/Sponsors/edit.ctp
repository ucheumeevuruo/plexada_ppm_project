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
        <legend><?= __('Edit Sponsor') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('last_name', ['label' => ['class' => 'mandatory']]); ?>
                <?= $this->Form->control('first_name', ['label' => ['class' => 'mandatory']]); ?>
                <?= $this->Form->control('other_names'); ?>
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

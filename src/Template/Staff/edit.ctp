<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 * @var \App\Model\Entity\Roles $roles
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="staff container-fluid">
    <?= $this->Form->create($staff) ?>
    <fieldset>
        <legend><?= __('Edit Staff') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('first_name'); ?>
                <?= $this->Form->control('last_name'); ?>
                <?= $this->Form->control('other_names'); ?>
                <?= $this->Form->control('user.username'); ?>
                <?= $this->Form->control('user.email'); ?>
                <?= $this->Form->control('user.password', ['value' => '']); ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('role_id', ['options' => $roles, 'empty' => true, 'required' => true]); ?>
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

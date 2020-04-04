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
        <?php
            echo $this->Form->control('last_name');
            echo $this->Form->control('first_name');
            echo $this->Form->control('other_names');
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('address');
            echo $this->Form->control('state');
            echo $this->Form->control('country');
            echo $this->Form->control('email');
            echo $this->Form->control('phone_no');
//            echo $this->Form->control('last_updated');
//            echo $this->Form->control('system_user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

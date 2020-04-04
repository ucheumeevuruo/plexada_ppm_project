<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 * @var \App\Model\Entity\Roles $roles
 */
?>
    <?= $this->Form->create($staff) ?>
    <fieldset>
        <legend><?= __('Add Staff') ?></legend>
        <?php
            echo $this->Form->control('last_name');
            echo $this->Form->control('first_name');
            echo $this->Form->control('other_names');
            echo $this->Form->control('role_id', ['options' => $roles, 'empty' => true, 'required' => true]);
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

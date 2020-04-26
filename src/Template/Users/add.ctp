<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="users form large-9 medium-8 content w-50 mx-auto py-5">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend class="text-white bg-primary"><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('email');
            echo $this->Form->control('status_id', ['options' => $lov,'type'=>'hidden','default'=>1]);
            echo $this->Form->control('role_id', ['options' => $roles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'bg-primary']) ?>
    <?= $this->Form->end() ?>
</div>

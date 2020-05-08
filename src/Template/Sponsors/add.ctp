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
        <legend><?= __('Add Sponsor') ?></legend>
        <?php
            echo $this->Form->control('last_name');
            echo $this->Form->control('first_name');
            echo $this->Form->control('other_names');
            echo $this->Form->control('sponsor_type_id');
            echo $this->Form->control('role');
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

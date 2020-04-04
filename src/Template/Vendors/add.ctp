<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vendor $vendor
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="vendors form large-9 medium-8 columns content">
    <?= $this->Form->create($vendor) ?>
    <fieldset>
        <legend><?= __('Add Donor') ?></legend>
        <?php
            echo $this->Form->control('company_name');
            echo $this->Form->control('director1');
            echo $this->Form->control('director2');
            echo $this->Form->control('director3');
            echo $this->Form->control('address');
            echo $this->Form->control('state');
            echo $this->Form->control('country');
            echo $this->Form->control('phone_no');
//            echo $this->Form->control('last_updated');
//            echo $this->Form->control('system_user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personel $personel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Personel'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="personel form large-9 medium-8 columns content">
    <?= $this->Form->create($personel) ?>
    <fieldset>
        <legend><?= __('Add Personel') ?></legend>
        <?php
            echo $this->Form->control('Last_name');
            echo $this->Form->control('first_name');
            echo $this->Form->control('Other_names');
            echo $this->Form->control('role');
            echo $this->Form->control('Address');
            echo $this->Form->control('State');
            echo $this->Form->control('country');
            echo $this->Form->control('email');
            echo $this->Form->control('phone_no');
//            echo $this->Form->control('last_updated');
//            echo $this->Form->control('system_user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

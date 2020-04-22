<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lov $lov
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lov'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="lov form large-9 medium-8 columns content">
    <?= $this->Form->create($lov) ?>
    <fieldset>
        <legend><?= __('Add Lov') ?></legend>
        <?php
            echo $this->Form->control('lov_type');
            echo $this->Form->control('lov_value');
            echo $this->Form->control('last_updated');
            echo $this->Form->control('system_user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

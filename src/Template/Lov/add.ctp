<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lov $lov
 */
?>
<div class="lov form large-9 medium-8 columns content">
    <?= $this->Form->create($lov) ?>
    <fieldset>
        <legend><?= __('Add Lov') ?></legend>
        <?php
            echo $this->Form->control('lov_type');
            echo $this->Form->control('lov_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

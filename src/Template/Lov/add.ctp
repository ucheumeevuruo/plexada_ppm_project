<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lov $lov
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();

?>
<div class="lov form large-9 medium-8 columns content">
    <?= $this->Form->create($lov) ?>
    <fieldset>
        <legend><?= __('Add Lov') ?></legend>
        <?php
            echo $this->Form->control('lov_type',['label'=>'Type']);
            echo $this->Form->control('lov_value',['label'=>'Value']);
            echo $this->Form->control('last_updated',['type'=>'hidden']);
            echo $this->Form->control('system_user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

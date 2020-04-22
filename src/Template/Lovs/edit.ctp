<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lov $lov
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lov->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lov->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lovs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="lovs form large-9 medium-8 columns content">
    <?= $this->Form->create($lov) ?>
    <fieldset>
        <legend><?= __('Edit Lov') ?></legend>
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

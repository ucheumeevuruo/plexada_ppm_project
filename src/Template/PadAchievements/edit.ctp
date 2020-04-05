<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PadAchievement $padAchievement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $padAchievement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $padAchievement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pad Achievements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['controller' => 'Pads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pad'), ['controller' => 'Pads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="padAchievements form large-9 medium-8 columns content">
    <?= $this->Form->create($padAchievement) ?>
    <fieldset>
        <legend><?= __('Edit Pad Achievement') ?></legend>
        <?php
            echo $this->Form->control('pad_id', ['options' => $pads]);
            echo $this->Form->control('specific_objective');
            echo $this->Form->control('first_indicator');
            echo $this->Form->control('second_indicator');
            echo $this->Form->control('third_indicator');
            echo $this->Form->control('forth_indicator');
            echo $this->Form->control('fifth_indicator');
            echo $this->Form->control('sixth_indicator');
            echo $this->Form->control('m_e_method');
            echo $this->Form->control('critical assumptions');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

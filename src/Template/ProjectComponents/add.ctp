<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectComponent $projectComponent
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Project Components'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class ="container">
<div class="projectComponents form columns content">
    <?= $this->Form->create($projectComponent) ?>
    <fieldset>
        <legend><?= __('Add Project Component') ?></legend>
        <?php
            echo $this->Form->control('component');
            echo $this->Form->control('cost');
            echo $this->Form->control('project_id', ['options' => $projects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

</div>

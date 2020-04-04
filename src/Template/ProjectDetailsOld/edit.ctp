<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailOld $projectDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Project Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sponsors'), ['controller' => 'Sponsors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sponsor'), ['controller' => 'Sponsors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($projectDetail) ?>
    <fieldset>
        <legend><?= __('Edit Project Detail') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Description');
            echo $this->Form->control('location');
            echo $this->Form->control('vendor_id', ['options' => $vendors, 'empty' => true]);
            echo $this->Form->control('manager_id');
            echo $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true]);
            echo $this->Form->control('current_status');
            echo $this->Form->control('start_dt', ['empty' => true]);
            echo $this->Form->control('end_dt', ['empty' => true]);
            echo $this->Form->control('last_updated');
            echo $this->Form->control('system_user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

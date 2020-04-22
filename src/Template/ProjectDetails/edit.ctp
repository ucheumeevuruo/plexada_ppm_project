<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
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
        <li><?= $this->Html->link(__('List Staff'), ['controller' => 'Staff', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staff', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sponsors'), ['controller' => 'Sponsors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sponsor'), ['controller' => 'Sponsors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lov'), ['controller' => 'Lov', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lov'), ['controller' => 'Lov', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Annotations'), ['controller' => 'Annotations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Annotation'), ['controller' => 'Annotations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($projectDetail) ?>
    <fieldset>
        <legend><?= __('Edit Project Detail') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('location');
            echo $this->Form->control('vendor_id', ['options' => $vendors, 'empty' => true]);
            echo $this->Form->control('manager_id');
            echo $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true]);
            echo $this->Form->control('waiting_since', ['empty' => true]);
            echo $this->Form->control('waiting_on_id', ['options' => $staff, 'empty' => true]);
            echo $this->Form->control('status_id');
            echo $this->Form->control('priority_id', ['options' => $lov]);
            echo $this->Form->control('start_dt', ['empty' => true]);
            echo $this->Form->control('end_dt', ['empty' => true]);
            echo $this->Form->control('last_updated');
            echo $this->Form->control('system_user_id', ['options' => $users]);
            echo $this->Form->control('annotation_id', ['options' => $annotations, 'empty' => true]);
            echo $this->Form->control('project_id');
            echo $this->Form->control('environmental_factors');
            echo $this->Form->control('partners');
            echo $this->Form->control('funding');
            echo $this->Form->control('approvals');
            echo $this->Form->control('risks');
            echo $this->Form->control('components');
            echo $this->Form->control('price_id', ['options' => $prices]);
            echo $this->Form->control('sub_status_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

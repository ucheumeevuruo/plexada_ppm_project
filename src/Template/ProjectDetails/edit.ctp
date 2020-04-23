<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
 */
?>
<div class="projectDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($projectDetail) ?>
    <fieldset>
        <legend class="text-primary"><?= __('Edit Project Detail') ?></legend>
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
    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
    <?= $this->Form->end() ?>
</div>

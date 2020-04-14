<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="projectDetails container-fluid">
    <?= $this->Form->create($projectDetail) ?>
    <fieldset>
        <legend><?= __('Add Project Detail') ?></legend>
        <div class="col-md-6 float-left">
            <?= $this->Form->control('Name') ?>
            <?= $this->Form->control('Description', ['type' => 'textarea']) ?>
            <?= $this->Form->control('price.budget', ['required' => true, 'prepend' => '<i class="addon-left">₦</i>', 'class' => 'addon-left', 'step' => '#,000']) ?>
            <?= $this->Form->control('priority_id', ['options' => $priority, 'empty' => true]) ?>
        </div>
        <div class="col-md-6 float-left">
            <?= $this->Form->control('start_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'Start Date', 'id' => 'datepicker', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']) ?>
            <?= $this->Form->control('end_dt', ['empty' => true, 'class' => 'addon-right', 'label' => 'End Date', 'id' => 'datepicker1', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']) ?>
            <?= $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true]) ?>
            <?= $this->Form->control('status_id', ['options' => $lov, 'type' => 'hidden', 'default' => 1]) ?>
            <?= $this->Form->control('manager_id', ['options' => $staff, 'empty' => true, 'label' => 'Project Manager']) ?>
            <?= $this->Form->control('system_user_id', ['type' => 'hidden', 'options' => [$authUser['id']], 'default' => $authUser['id']]) ?>
            <?= $this->Form->control('vendor_id', ['options' => $vendors, 'empty' => true, 'label' => 'Donor']) ?>
            <?= $this->Form->control('tasks name', ['options' => $tasks, 'empty' => true, 'label' => 'Task']) ?>
        </div>
    </fieldset>
    <div class="col-md-12 float-md-none">
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>

</div>
<script>
$(function() {
    $('#datepicker, #datepicker1').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        startDate: "0d",
        // "endDate": "09-15-2017",
        "keyboardNavigation": false
    });
});
</script>
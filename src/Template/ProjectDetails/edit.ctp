<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="container-fluid">
    <?= $this->Form->create($projectDetail) ?>
    <fieldset>
        <legend><?= __('Edit Project Detail') ?></legend>
        <div class="col-md-6 float-left">
        <?php
            echo $this->Form->control('name', ['readonly' => true]);
            echo $this->Form->control('description', ['type' => 'textarea']);
//            echo $this->Form->control('location');
//            echo $this->Form->control('vendor_id', ['options' => $vendors, 'empty' => true, 'label' => 'Donor']);
            echo $this->Form->control('status_id', ['options' => $lov]);
            echo $this->Form->control('sub_status_id', ['options' => $subStatus, 'empty' => true]);
            ?>
        </div>
        <div class="col-md-6 float-left">
            <?php
            echo $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true, 'readonly' => true]);
            echo $this->Form->control('price.budget', ['readonly' => true, 'prepend' => '<i class="addon-left">₦</i>', 'class' => 'addon-left', 'step' => '#,000']);
            echo $this->Form->control('manager_id', ['options' => $staff, 'empty' => true, 'label' => 'Project Manager']);
            //            echo $this->Form->control('waiting_on_id', ['options' => $personnel, 'empty' => true]);
//            echo $this->Form->control('waiting_since');
            echo $this->Form->control('start_dt', ['empty' => true, 'label' => 'Start Date', 'id' => 'datepicker', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
            echo $this->Form->control('end_dt', ['empty' => true, 'label' => 'End Date', 'id' => 'datepicker1', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
//            echo $this->Form->control('last_updated');
//            echo $this->Form->control('system_user_id', ['options' => $users, 'empty' => true]);
        ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    $(function () {
        $('#datepicker, #datepicker1').datepicker({
            inline: true,
            "format": "dd/mm/yyyy",
            startDate: "0d",
            // "endDate": "09-15-2017",
            "keyboardNavigation": false
        });
    });
</script>

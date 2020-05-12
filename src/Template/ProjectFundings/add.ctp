<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectFunding $projectFunding
 */
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="projectFundings w-75 mx-auto">
    <?= $this->Form->create($projectFunding) ?>
    <fieldset>
        <legend class="text-light bg-primary"><?= __('Add Project Funding') ?></legend>
        <?php
        echo $this->Form->hidden('project_id', ['value' => $projects->id]);
        echo $this->Form->control('start_date', ['empty' => true, 'class' => 'addon-right', 'label' => 'Start Date', 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
        echo $this->Form->control('end_date', ['empty' => true, 'class' => 'addon-right', 'label' => 'End Date', 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']);
        echo $this->Form->control('currency_id', ['options' => $currencies]);
        echo $this->Form->control('funding');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    // ////Date picker
    $(document).ready(function(){
        // ////Date picker
        $(function() {
            $('#waiting_since, #start_date, #end_date').datepicker({
                inline: true,
                "format": "dd/mm/yyyy",
                startDate: "0d",
                // "endDate": "09-15-2017",
                "keyboardNavigation": false
            });
        });
    });
</script>
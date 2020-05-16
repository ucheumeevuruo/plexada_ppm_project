+<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milestone $milestone
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<div class="milestones container">
    <?= $this->Form->create($milestone) ?>
    <fieldset>
        <legend class="text-primary text-left"><?= __('Add Indicator') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php if(is_null($id)) echo $this->Form->control('project_id', ['options' => $projects, 'empty' => true]); else ?>
                <?= $this->Form->hidden('project_id', ['value' => $id]); ?>
                <?= $this->Form->control('name', ['autocomplete' => 'off']); ?>
                <?= $this->Form->control('description', ['type' => 'textarea']); ?>
                <?= $this->Form->hidden('status_id', ['value' => 1]); ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->hidden('trigger_id', ['options' => $triggers, 'empty' => true]); ?>
                <?= $this->Form->control('amount', ['autocomplete' => 'off', 'max'=> $result]); ?>
                <?= $this->Form->control('start_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'text']); ?>
                <?= $this->Form->control('end_date', ['autocomplete' => 'off', 'id' => 'end_date', 'type' => 'text']); ?>
                <?= $this->Form->control('Indicator_type', ['options' => ['critical','non-critical','PPA','intermediary'], 'empty' => true]); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$(function() {
    $('#start_date, #end_date').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        startDate: "0d"
    }).on('changeDate', function(selected){
            let date = new Date(selected);
            date.setDate(date.getDate() + 1);
            // $('#end_date').datepicker({inline: true,startDate : date});
    })
    $('#end_date').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        // startDate: "0d",
        // "endDate": "09-15-2017",
        "keyboardNavigation": false
    });
});
</script>

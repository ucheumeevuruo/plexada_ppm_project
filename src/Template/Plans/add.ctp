<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plan $plan
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="plans form large-9 medium-8 columns content">
    <?= $this->Form->create($plan) ?>
    <fieldset>
        <legend><?= __('Add Plan') ?></legend>
        <?php
        echo $this->Form->control('activity_id', ['value'=>$activity_id,'type'=>'hidden']);
        echo $this->Form->control('name');
        echo $this->Form->control('title');
        echo $this->Form->control('comment', ['type' => 'textArea']);
        echo $this->Form->control('plan_type', ['options' => [
            'Inspection' => 'Inspection', 'Assessment' => 'Assessment', 'Evaluation' => 'Evaluation'
        ]]);
        echo $this->Form->control('assigned_to_id', ['options' => $staff]);
        echo $this->Form->control('user_id', ['value'=>$logged_in_user,'type'=>'hidden']);
        echo $this->Form->control('start_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'text', 'label' => 'State date', 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>']);
        echo $this->Form->control('end_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'text', 'label' => 'End date', 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$(function() {
    $('#start_date, #end_date').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
        startDate: "<?php echo $s_date ?>",
         endDate: "<?php echo $e_date ?>",
    }).on('changeDate', function(selected) {
        let date = new Date(selected);
        date.setDate(date.getDate() + 1);
        // $('#end_date').datepicker({inline: true,startDate : date});
    })
    
});
</script>
<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<?php echo $this->Html->css('mandatory'); ?>
<?= $this->Html->script('mychart.js') ?>
<div class="projectDetails form large-9 medium-8 columns content">
    <h3 class="text-center">Design Approval</h3>

    <?= $this->Form->create($projectDetail) ?>


    <?php echo $this->Form->control('approve_design', ['options' => ['Y' => 'Yes', 'N' => 'No']]); ?>
    <?php echo $this->Form->hidden('start_dt', ['options' => ['Y' => 'Yes', 'N' => 'No']]); ?>
    <?php echo $this->Form->hidden('end_dt', ['options' => ['Y' => 'Yes', 'N' => 'No']]); ?>



    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
    <?= $this->Form->end() ?>
</div>


<script>
    // ////Date picker
    $(function() {
        $('#waiting_since, #start_dt, #end_dt').datepicker({
            inline: true,
            "format": "dd/mm/yyyy",
            startDate: "0d",
            // "endDate": "09-15-2017",
            "keyboardNavigation": false
        });
    });
</script>
<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 * @var \App\Model\Entity\Project $projects
 * @var \App\Model\Entity\Project $project
 * @var \App\Model\Entity\ProjectDetail $project_detail
 * @var \App\Model\Entity\Milestone $milestone
 * @var \App\Model\Entity\Staff $staff
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();

echo $this->Html->css('mandatory');
?>
<?= $this->Html->script('mychart.js') ?>
<div class="activities container-fluid">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend class="font-weight-bolder text-center"><?= __('Add Activities') ?></legend>
        <div class="row">
            <div class="col-md-6">
<<<<<<< Updated upstream
                <?php if (empty($project)): ?>
                    <?= $this->Form->control('project_id', ['options' => $projects, 'empty' => true]); ?>
                <?php else: ?>
                    <?= $this->Form->hidden('project_id', ['value' => $project->id, 'empty' => false]); ?>
                <?php endif;?>
                <?= $this->Form->control('milestone_id', ['options' => $milestone, 'label' => ['class' => 'mandatory font-weight-bolder']]); ?>
                <?= $this->Html->link(__('Create Milestones'), ['controller' => 'milestones', 'action' => 'add', $project->id], ['class' => 'overlay btn btn-info rounded-0', 'escape' => false]) ?>
                <?= $this->Form->control('name', ['autocomplete' => 'off', 'label' => ['class' => 'mandatory font-weight-bolder']]); ?>
                <?= $this->Form->control('description', ['type' => 'textarea', 'label' => ['class' => 'mandatory font-weight-bolder']]); ?>
                <?= $this->Form->hidden('activity_type_id', ['value' => 12]); ?>
                <?= $this->Form->hidden('status_id', ['value' => 1]); ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true, 'label' => ['class' => 'font-weight-bolder']]); ?>
                <?= $this->Form->hidden('priority_id', ['value' => 5]); ?>
                <?= $this->Form->hidden('currency_id', ['value' => $project->project_detail->currency->id]); ?>
                <?= $this->Form->control('start_date', ['empty' => true, 'class' => 'addon-right', 'label' => ['class' => 'font-weight-bolder'], 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>
                <?= $this->Form->control('end_date', ['empty' => true, 'class' => 'addon-right', 'label' => ['class' => 'font-weight-bolder'], 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off']); ?>
                <?= $this->Form->control('cost', ['autocomplete' => 'off', 'label' => ['class' => 'font-weight-bolder'], 'min' => 0, 'max' => $sumDiff]); ?>
=======
                <?php
                if ($project_id == null)
                    echo $this->Form->control('project_id', ['options' => $projectDetails, 'empty' => true]);
                else
                    echo $this->Form->hidden('project_id', ['value' => $project_id, 'empty' => false]);
                ?>
                <label class="control-label mandatory font-weight-bolder " for="milestone_id">Indicator</label>
                <?php echo $this->Form->control('milestone_id', ['options' => $milestones, 'label' => false, 'onchange'=>'javascript:recordClick();']); ?>

                <label class="control-label mandatory font-weight-bolder " for="name">Activity Name</label>
                <?php echo $this->Form->control('name', ['autocomplete' => 'off', 'label' => false]); ?>

                <label class="control-label mandatory font-weight-bolder " for="description">Description</label>
                <?php
                echo $this->Form->control('description', ['type' => 'textarea', 'label' => false]);
                echo $this->Form->hidden('activity_type_id', ['value' => 12]);
                echo $this->Form->hidden('status_id', ['value' => 1]);
                ?>
            </div>

            <div class="col-md-6">
                <label class="control-label font-weight-bolder " for="assigned_to_id">Assigned To</label>
                <?php
                echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true, 'label' => false]);
                echo $this->Form->hidden('priority_id', ['value' => 5]);
                echo $this->Form->hidden('currency_id', ['value' => $currency->project_detail->currency->id]);
                ?>
                <label class="control-label font-weight-bolder " for="start_date">Start Date</label>
                <?php echo $this->Form->control('start_date', ['empty' => true, 'class' => 'addon-right', 'onblur'=>"javascript:checkForDate();", 'label' => false, 'id' => 'start_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off','required']); ?>

                <label class="control-label font-weight-bolder " for="end_date">End Date</label>
                <?php echo $this->Form->control('end_date', ['empty' => true, 'class' => 'addon-right','onblur'=>"javascript:checkForDate();", 'label' => false, 'id' => 'end_date', 'type' => 'text', 'append' => '<i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>', 'autocomplete' => 'off','required']); ?>

                <label class="control-label font-weight-bolder " for="cost">Cost</label>
                <?php echo $this->Form->control('cost', ['autocomplete' => 'off', 'label' => false, 'min' => 0, 'max' => $sumDiff]); ?>
>>>>>>> Stashed changes
            </div>
        </div>

    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
    <?= $this->Html->link(__('New Lov'), ['controller' => 'activities', 'action' => 'method']) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    $(function() {
        let start_date = <?= json_encode($project->project_detail->start_dt->format('m/d/yy')); ?>;
        let end_date = <?= json_encode($project->project_detail->end_dt->format('m/d/yy')); ?>;
        $('#start_date').datepicker({
            inline: true,
            "format": "dd/mm/yyyy",
            startDate: new Date(start_date),
            endDate: new Date(end_date)
        }).on('changeDate', function(selected) {
            let date = new Date(selected.date.valueOf());
            date.setDate(date.getDate());
            $('#end_date').datepicker('setStartDate', date);
        })
        $('#end_date').datepicker({
            inline: true,
            "format": "dd/mm/yyyy",
            startDate: new Date(start_date),
            endDate: new Date(end_date),
            "keyboardNavigation": false
            
        });
<<<<<<< Updated upstream
        $(".overlay").click(function(event) {
            event.preventDefault();
            //load content from href of link
            $('#contentWrap2 .modal-body').load($(this).attr("href"), function() {
                $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content')
                    .removeClass()
                $('#MyModal5').modal('show')
            });
        });
=======
        
>>>>>>> Stashed changes
    });
    

</script>
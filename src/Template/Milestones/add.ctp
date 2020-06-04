+<?php
    /**
     * @var \App\View\AppView $this
     * @var \App\Model\Entity\Projects $project
     * @var \App\Model\Entity\Projects $projects
     * @var \App\Model\Entity\Lov $triggers
     * @var \App\Model\Entity\ProjectDetails $project_detail
     * @var \App\Model\Entity\Milestone $milestone
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
<div class="milestones container">
    <?= $this->Form->create($milestone) ?>
    <fieldset>
        <legend class="font-weight-bolder text-center"><?= __('Add Indicator') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php if (empty($project)):?>
                <?= $this->Form->control('project_id', ['options' => $projects, 'empty' => true]); ?>
                <?php else: ?>
                <?= $this->Form->hidden('project_id', ['value' => $project->id]); ?>
                <?php endif;?>
                <?= $this->Form->control('name', ['autocomplete' => 'off', 'label' => ['class' => 'font-weight-bolder mandatory']]); ?>
                <?= $this->Form->control('description', ['type' => 'textarea', 'label' => ['class' => 'font-weight-bolder']]); ?>
                <?= $this->Form->hidden('status_id', ['value' => 1]); ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->hidden('trigger_id', ['options' => $triggers, 'empty' => true]); ?>
                <?= $this->Form->control('amount', ['autocomplete' => 'off', 'label' => ['class' => 'font-weight-bolder mandatory'], 'max' => $sumDiff, 'min' => 0]); ?>
                <?= $this->Form->control('start_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'text', 'label' => ['class' => 'font-weight-bolder'], 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>',]); ?>
                <?= $this->Form->control('end_date', ['autocomplete' => 'off', 'id' => 'end_date', 'type' => 'text', 'label' => ['class' => 'font-weight-bolder'], 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>',]); ?>
                <?= $this->Form->control('Indicator_type', ['options' => ['critical', 'non-critical', 'PPA', 'intermediary', 'DLI'], 'label' => ['class' => 'font-weight-bolder'], 'empty' => true]); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
<script>
// $(function() {
    $(function() {
        let start_date = <?= !is_null($project->project_detail->start_dt) ? json_encode($project->project_detail->start_dt->format('m/d/yy')) : ''; ?>;
        let end_date = <?= !is_null($project->project_detail->end_dt) ? json_encode($project->project_detail->end_dt->format('m/d/yy')) : ''; ?>;
        $('#start_date').datepicker({
            inline: true,
            "format": "dd/mm/yyyy",
            startDate: new Date(start_date.toString()),
            endDate: new Date(end_date.toString())
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
    });
// })
</script>
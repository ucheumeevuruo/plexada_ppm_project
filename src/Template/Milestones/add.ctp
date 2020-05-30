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

<?php echo $this->Html->css('mandatory'); ?>


<div class="milestones container">
    <?= $this->Form->create($milestone) ?>
    <fieldset>
        <legend class="font-weight-bolder text-center"><?= __('Add Indicator') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php if (is_null($id)) echo $this->Form->control('project_id', ['options' => $projects, 'empty' => true]);
                else ?>
                <?= $this->Form->hidden('project_id', ['value' => $id]); ?>

                <label class="control-label mandatory font-weight-bolder" for="project">Name</label>
                <div class="input-group mb-3"><input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
                </div>
                <!-- <?= $this->Form->control('name', ['autocomplete' => 'off']); ?> -->
                <label class="control-label font-weight-bolder" for="description">Description</label>
                <?= $this->Form->control('description', ['type' => 'textarea', 'label' => false]); ?>
                <?= $this->Form->hidden('status_id', ['value' => 1]); ?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->hidden('trigger_id', ['options' => $triggers, 'empty' => true]); ?>
                <label class="control-label mandatory font-weight-bolder" for="amount">Amount</label>
                <?= $this->Form->control('amount', ['autocomplete' => 'off', 'max' => $result, 'label' => false, 'max' => $sumDiff, 'min' => 0]); ?>

                <label class="control-label font-weight-bolder" for="start_date">Start Date</label>
                <?= $this->Form->control('start_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'text', 'label' => false, 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>',]); ?>

                <label class="control-label font-weight-bolder" for="end_date">End Date</label>
                <?= $this->Form->control('end_date', ['autocomplete' => 'off', 'id' => 'end_date', 'type' => 'text', 'label' => false, 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>',]); ?>

                <label class="control-label font-weight-bolder" for="end_date">Indicator Type</label>
                <?= $this->Form->control('Indicator_type', ['options' => ['critical', 'non-critical', 'PPA', 'intermediary', 'DLI'], 'empty' => true, 'label' => false]); ?>
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
        }).on('changeDate', function(selected) {
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
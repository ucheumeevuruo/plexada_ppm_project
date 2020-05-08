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
<div class="projectDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($projectDetail) ?>
    <fieldset>
        <legend class="text-primary"><?= __('Edit Project Detail') ?></legend>
        <div class="col-sm-6 float-left">
            <?php
                echo $this->Form->control('name');
                echo $this->Form->control('description', ['label' => 'Brief']);
                echo $this->Form->control('location');
            ?>
            <div class="mb-3">
                <!-- <?= $this->Html->link(__('Add Objectives'), ['controller' => 'objectives', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?> -->
            </div>
            <?php
                echo $this->Form->control('manager_id', ['options' => $staff, 'empty' => true]);
                echo $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true,'label'=>'Project Sponsor']);
                echo $this->Form->control('donor_id', ['options' => $donors, 'empty' => true]);
                echo $this->Form->control('mda_id', ['options' => $mdas, 'empty' => true]);
                echo $this->Form->control('DLI');

            ?>
        </div>
        <div class="col-sm-6 float-left">
            <!-- <?= $this->Html->link(__('Add Milestones'), ['controller' => 'milestones', 'action' => 'add', $project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 mt-5 mb-3 overlay']) ?> -->

            <div id="inputEnv">
                    <div class="input-group mb-3 mt-5">
                        <input type="text" name="environmental_factors" class="form-control m-input"
                            placeholder="Environmental factor" autocomplete="off">
                        <div class="input-group-append">
                            <button id="removeEnv" type="button" class="btn btn-danger">Remove</button>
                        </div>
                    </div>
                </div>
            <div id="newEnv"></div>
            <button id="addEnv" type="button" class="btn btn-primary mb-3">Add Environmental Factor</button>

            <div class="form-group text">
                <label class="control-label" for="start_dt">Start date</label>
                    <div class="input-group"><input type="text" value ="<?=$projectDetail->start_dt ?>" name="start_dt" class="form-control addon-right" empty="1"
                            id="start_dt" autocomplete="off">
                        <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0 ml-5"></i></span>
                    </div>
            </div>

            <div class="form-group text">
                <label class="control-label" for="end_dt">End date</label>
                    <div class="input-group"><input type="text" value ="<?=$projectDetail->end_dt ?>" name="end_dt" class="form-control addon-right" empty="1"
                            id="end_dt" autocomplete="off">
                        <span class="input-group-addon"><i
                                class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                    </div>
            </div>

            <label for="cars">Currency</label>
                <select id="cars" name="currency" class="mb-3">
                    <option value="naira">NGN</option>
                    <option value="dollar">USD</option>
                    <option value="euro">EU</option>
                    <option value="pound">GBP</option>
                </select>

            <?php
                echo $this->Form->control('budget');
                echo $this->Form->control('expenses');
                echo $this->Form->control('risk_and_issues');
                echo $this->Form->control('project_id', ['type' => 'hidden']);
            ?>
        </div>
    </fieldset>
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

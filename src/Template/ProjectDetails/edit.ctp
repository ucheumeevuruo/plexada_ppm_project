<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
 */
?>
<div class="projectDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($projectDetail) ?>
    <fieldset>
        <legend class="text-primary"><?= __('Edit Project Detail') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('location');
            echo $this->Form->control('vendor_id', ['options' => $vendors, 'empty' => true,'label'=>'Project Sponsor']);
            echo $this->Form->control('manager_id',['options' => $staff, 'empty' => true]);
            // echo $this->Form->control('sponsor_id', ['options' => $sponsors, 'empty' => true]);
            ?>
            <div class="form-group text">
                <label class="control-label" for="waiting_since">Waiting since</label>
                <div class="input-group"><input type="text" value ="<?=$projectDetail->waiting_since ?>" name="waiting_since" class="form-control" empty="1"
                        id="waiting_since" autocomplete="off">
                    <span class="input-group-addon"><i
                            class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                </div>
            </div>
            <?php
            // echo $this->Form->control('waiting_since', ['empty' => true]);
            echo $this->Form->control('waiting_on_id', ['options' => $staff, 'empty' => true]);
            echo $this->Form->control('status_id', ['options' => $lov, 'empty' => true]);
            echo $this->Form->control('priority_id', ['options' => $lov]);
            ?>
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
            <!-- echo $this->Form->control('start_dt', ['empty' => true]);
            echo $this->Form->control('end_dt', ['empty' => true]); -->
            <?php
            // echo $this->Form->control('last_updated');
            echo $this->Form->control('system_user_id', ['options' => $users]);
            // echo $this->Form->control('annotation_id', ['options' => $annotations, 'empty' => true]);
            echo $this->Form->control('project_id', ['type' => 'hidden']);
            echo $this->Form->control('environmental_factors');
            // echo $this->Form->control('partners');
            echo $this->Form->control('funding',['default'=> 1,'type'=>'hidden']);
            // echo $this->Form->control('approvals');
            // echo $this->Form->control('risks');
            // echo $this->Form->control('components');
            // echo $this->Form->control('price_id', ['options' => $prices]);
            echo $this->Form->control('sub_status_id',['default'=> 1,'type'=>'hidden']);
        ?>
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
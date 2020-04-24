<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="activities container-fluid">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend><?= __('Add Next Step') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php
                    if($project_id == null)
                        echo $this->Form->control('project_id', ['options' => $projectDetails, 'empty' => true]);
                    else
                        echo $this->Form->control('project_id', ['options' => [$project_id], 'default' => $project_id, 'empty' => false, 'type' => 'hidden']);
                    echo $this->Form->control('next_activity', ['label' => 'Step']);
                    echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true]);
                    echo $this->Form->control('percentage_completion', ['type' => 'number', 'min' => 0, 'max' => 100, 'class' => 'addon-right', 'append' => '<i class="addon-right">%</i>']);
                    // echo $this->Form->control('priority_id', ['options' => $priority, 'empty' => true]);
                    echo $this->Form->hidden('status_id', ['options' => $status, 'default' => 1]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                    echo $this->Form->control('description', ['type' => 'textarea']);
                ?>
            </div>
        </div>
        <?php
//            if($project_id == null)
//                echo $this->Form->control('project_id', ['options' => $projectDetails, 'empty' => true]);
//            else
//                    echo $this->Form->control('project_id', ['options' => [$project_id], 'default' => $project_id, 'empty' => false, 'type' => 'hidden']);
////            echo $this->Form->control('current_activity');
////            echo $this->Form->control('waiting_on');
////            echo $this->Form->control('waiting_since', ['empty' => true]);
//            echo $this->Form->control('next_activity', ['label' => 'Step']);
//            echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true]);
//            echo $this->Form->control('percentage_completion', ['type' => 'number', 'max' => 100]);
//            echo $this->Form->control('priority_id', ['options' => $lov]);
//            echo $this->Form->control('description', ['type' => 'textarea']);
//            echo $this->Form->control('last_updated');
//            echo $this->Form->control('system_user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

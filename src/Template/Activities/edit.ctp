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
        <legend><?= __('Edit Next Step') ?></legend>
        <div class="row">
            <div class="col-md-6">
                <?php
                echo $this->Form->hidden('project_id', ['options' => $projectDetails, 'empty' => true]);
                echo $this->Form->control('next_activity', ['label' => 'Step']);
                echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true]);
                echo $this->Form->control('percentage_completion', ['type' => 'number', 'min' => 0, 'max' => 100, 'class' => 'addon-right', 'append' => '<i class="addon-right">%</i>']);
                echo $this->Form->control('priority_id', ['options' => $priority]);
                echo $this->Form->control('status_id', ['options' => $status]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $this->Form->control('description', ['type' => 'textarea']);
                ?>
            </div>
        </div>
<!--        --><?php
//            echo $this->Form->control('project_id', ['options' => $projectDetails, 'empty' => true, 'type' => 'hidden']);
//            echo $this->Form->control('current_activity');
////            echo $this->Form->control('waiting_on');
////            echo $this->Form->control('waiting_since', ['empty' => true]);
//            echo $this->Form->control('next_activity');
//            echo $this->Form->control('assigned_to_id', ['options' => $staff, 'empty' => true]);
//            echo $this->Form->control('percentage_completion');
//            echo $this->Form->control('description');
//            echo $this->Form->control('priority_id', ['options' => $lov, 'empty' => true]);
////            echo $this->Form->control('last_updated');
//        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disbursement $disbursement
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $disbursement->disbursement_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $disbursement->disbursement_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Disbursements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Milestones'), ['controller' => 'Milestones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Milestone'), ['controller' => 'Milestones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="disbursements form large-9 medium-8 columns content">
    <?= $this->Form->create($disbursement) ?>
    <fieldset>
        <legend><?= __('Edit Disbursement') ?></legend>
        
        <?php
            echo $this->Form->control('project_id', ['value' => $projects, 'type'=>'hidden']);
            echo $this->Form->control('milestone_id', ['value' => $milestones,'type'=>'hidden']);        
            // echo $this->Form->control('project_id', ['options' => $projects, 'empty' => true]);
            // echo $this->Form->control('milestone_id', ['options' => $milestones, 'empty' => true]);
            echo $this->Form->control('name',['readonly']);
            // echo $this->Form->control('percentage_completion');
            echo $this->Form->control('start_date', ['autocomplete' => 'off', 'id' => 'start_date', 'type' => 'text', 'label' => 'Disbursement date', 'append' => '<i class="fa fa-calendar-alt fa-lg btn btn-outline-dark btn-md addon-right border-0"></i>']);
            // echo $this->Form->control('end_date', ['empty' => true,'type'=>'text']);
            echo $this->Form->control('cost');
            echo $this->Form->control('description',['type'=>'textarea','label'=>'comments']);
            // echo $this->Form->control('last_updated');
            // echo $this->Form->control('system_user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
$(function() {
    $('#start_date').datepicker({
        inline: true,
        "format": "dd/mm/yyyy",
    }).on('changeDate', function(selected) {
        let date = new Date(selected);
        date.setDate(date.getDate() + 1);
    })
    
});
</script>

<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<?php echo $this->Html->css('mandatory'); ?>


<div class="projects w-75 mx-auto">
    <h3 class="text-center text-primary font-weight-bolder">Edit Project</h3>

    <?= $this->Form->create($project) ?>
    <fieldset>
        <label class="control-label mandatory font-weight-bolder text-success" for="name">Project Name</label>
        <?php echo $this->Form->control('name', ['label' => false]); ?>

        <label class="control-label mandatory font-weight-bolder text-success" for="introduction">Introduction</label>
        <?php echo $this->Form->control('introduction', ['label' => false]); ?>

        <label class="control-label mandatory font-weight-bolder text-success" for="location">Location</label>
        <?php echo $this->Form->control('location', ['label' => false]);
        //            echo $this->Form->control('project_detail.status_id', ['options' => $statuses, 'empty' => true]);
        //            echo $this->Form->control('project_detail.currency_id', ['options' => $currencies, 'empty' => true]);
        //            echo $this->Form->control('project_detail.budget');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => "bg-primary"]) ?>
    <?= $this->Form->end() ?>
</div>
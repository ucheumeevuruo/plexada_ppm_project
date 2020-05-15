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

<div class="projects w-75 mx-auto">
    <?= $this->Form->create($project) ?>
    <fieldset>
        <legend class="bg-primary text-light"><?= __('Edit Project') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('introduction');
            echo $this->Form->control('location');
            echo $this->Form->control('cost');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => "bg-primary"]) ?>
    <?= $this->Form->end() ?>
</div>

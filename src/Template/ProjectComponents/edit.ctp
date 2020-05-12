<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectComponent $projectComponent
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<div class="projectComponents form container">
    <?= $this->Form->create($projectComponent) ?>
    <fieldset>
        <legend><?= __('Edit Project Component') ?></legend>
        <?php
            echo $this->Form->control('component');
            echo $this->Form->control('cost');
            echo $this->Form->control('project_id', ['options' => $projects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

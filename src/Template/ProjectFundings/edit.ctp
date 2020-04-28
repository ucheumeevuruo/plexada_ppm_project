<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectFunding $projectFunding
 */
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="projectFundings w-75 mx-auto">
    <?= $this->Form->create($projectFunding) ?>
    <fieldset>
        <legend class="bg-primary text-light"><?= __('Edit PPF Details') ?></legend>
        <?php
        echo $this->Form->control('milestone_id', ['options' => $milestones]);
        echo $this->Form->control('funding');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'bg-primary']) ?>
    <?= $this->Form->end() ?>
</div>
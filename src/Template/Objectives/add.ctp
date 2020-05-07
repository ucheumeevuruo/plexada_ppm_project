<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Objective $objective
 */
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="objectives form large-9 medium-8 columns content">
    <?= $this->Form->create($objective) ?>
    <fieldset>
        <legend><?= __('Add Objective') ?></legend>
        <?php
            echo $this->Form->control('project_id', ['options' => $projects, 'text' => 'hidden']);
            echo $this->Form->control('objective');
        ?>
    </fieldset>  
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

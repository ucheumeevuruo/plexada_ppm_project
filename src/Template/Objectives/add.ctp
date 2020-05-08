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

<div class="objectives container-fluid">
    <?= $this->Form->create($objective) ?>
    <fieldset>
        <legend class="bg-primary text-light mb-3 text-center"><?= __('Add Objective') ?></legend>
        <input type="hidden"id="project_id" name="project_id" required="required" value="<?= $project_info->id; ?>">
        <?php
            // echo $this->Form->control('project_id', ['options' =>$projects, 'type' => 'hidden']);

            // echo $this->form->control();
            echo $this->Form->control('objective');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

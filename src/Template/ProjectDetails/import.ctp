<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam $exam
 */
?>
<div class="exams container-fluid">
    <?= $this->Form->create('student', ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Upload Result') ?></legend>
        <?php
            echo $this->Form->control('upload', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
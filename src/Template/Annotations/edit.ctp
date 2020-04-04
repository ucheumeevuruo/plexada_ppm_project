<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Annotation $annotation
 */
?>
<div class="annotations container-fluid">
    <?= $this->Form->create($annotation) ?>
    <fieldset>
        <legend><?= __('Edit Annotation') ?></legend>
        <?php
            echo $this->Form->hidden('project_id');
            echo $this->Form->control('comment', ['type' => 'textarea']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

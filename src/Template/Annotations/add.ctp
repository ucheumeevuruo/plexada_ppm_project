<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Annotation $annotation
 */
?>
<div class="annotations container-fluid">
    <?= $this->Form->create($annotation) ?>
    <fieldset>
        <legend><?= __('Add Annotation') ?></legend>
        <?php
        if(is_null($id))
            echo $this->Form->control('project_id');
        else
            echo $this->Form->hidden('project_id', ['default' => $id]);
        echo $this->Form->control('comment', ['type' => 'textarea']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

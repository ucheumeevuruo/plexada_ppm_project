<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $document->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $document->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Documents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documents form large-9 medium-8 columns content">
    <?= $this->Form->create($document) ?>
    <fieldset>
        <legend><?= __('Edit Document') ?></legend>
        <?php
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('document_no');
            echo $this->Form->Select(
                'document_type', 
                ['implementation_status' => 'Implementation Status', 
                    'Procurement Plan' => 'Procurement Plan', 
                    'Agreement Letter' => 'Agreement Letter', 
                    'Project Information And Integration' => 'Project Information And Integration',
                    'Resettlement Plan' => 'Resettlement Plan',
                    'Environmental Assessment' => 'Environmental Assessment',
                    'Project Appraisal Document' => 'Project Appraisal Document',
                    'Project Implementation Document' => 'Project Implementation Document',
                    'Implementation Completion' => 'Implementation Completion',
                    'Others' => 'Others'
                ], 
                ['empty' => 'Select Document Type'] );
            echo $this->Form->control('date_uploaded');
            echo $this->Form->control('file_uploaded', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

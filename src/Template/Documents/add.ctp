<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="container-fluid ml-3">
    <div class="col-xl-8 col-md-6 mb-4">
        <div class="documents form large-9 medium-8 columns content">
            <?= $this->Form->create($document) ?>
            <fieldset>
                <legend><?= __('Add Document') ?></legend>
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
            // echo $this->Form->control('date_uploaded');
            echo $this->Form->control('file_uploaded', ['type' => 'file']);
        ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
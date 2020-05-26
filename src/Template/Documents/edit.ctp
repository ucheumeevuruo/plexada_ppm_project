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

<?php echo $this->Html->css('mandatory'); ?>

<div class="documents form large-9 medium-8 columns content">
    <h3 class="text-center text-primary font-weight-bolder">Edit Document</h3>

    <?= $this->Form->create($document) ?>
    <fieldset>
        <label class="control-label font-weight-bolder mandatory text-success" for="project_id">Project Name</label>
        <?php echo $this->Form->control('project_id', ['options' => $projects, 'label' => false]); ?>

        <label class="control-label font-weight-bolder mandatory text-success" for="document_no">Document Id</label>
        <?php echo $this->Form->control('document_no', ['label' => false]); ?>

        <label class="control-label font-weight-bolder mandatory text-success" for="document_no">Document Type</label>
        <?php echo $this->Form->Select(
            'document_type',
            [
                'implementation_status' => 'Implementation Status',
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
            ['empty' => 'Select Document Type', 'label' => false, 'class' => 'mb-3']
        );
        echo $this->Form->control('date_uploaded'); ?>

        <label class="control-label font-weight-bolder mandatory text-success" for="document_no">Document
            Uploaded</label>
        <?php echo $this->Form->control('file_uploaded', ['type' => 'file', 'label' => false, 'class' => 'mb-4']); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => "bg-primary"]) ?>
    <?= $this->Form->end() ?>
</div>
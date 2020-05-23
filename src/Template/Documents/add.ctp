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


<div class="container-fluid ml-3">
    <h3 class="text-center text-primary font-weight-bolder">Add Document</h3>

    <div class="col-xl-8 col-md-6 mb-4">
        <div class="documents form large-9 medium-8 columns content">
            <?= $this->Form->create($document) ?>
            <fieldset>
                <!-- <legend><?= __('Add Document') ?></legend> -->

                <label class="control-label font-weight-bolder mandatory text-success" for="project_id">Project
                    Name</label>
                <?php echo $this->Form->control('project_id', ['options' => $projects, 'label' => false]); ?>

                <label class="control-label font-weight-bolder mandatory text-success" for="document_no">Document
                    ID</label>
                <div class="input-group mb-3"><input type="text" name="document_no" id="document_no"
                        class="form-control" autocomplete="off">
                </div>

                <label class="control-label font-weight-bolder mandatory text-success" for="document_type">Document
                    Type</label>
                <?php
                // echo $this->Form->control('document_no');
                echo $this->Form->Select(
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
                    ['empty' => 'Select Document Type', 'class' => 'mb-4', 'label' => false]
                ); ?>

                <label class="control-label font-weight-bolder mandatory text-success" for="document_type">Click to
                    select a file to upload</label>
                <?php
                // echo $this->Form->control('date_uploaded');
                echo $this->Form->control('file_uploaded', ['type' => 'file', 'label' => false, 'class' => 'mb-4']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => "bg-primary"]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
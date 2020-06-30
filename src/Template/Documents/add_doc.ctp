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
    <h3 class="text-center font-weight-bolder">Add Project Document</h3>

    <div class="col-xl-8 col-md-6 mb-4">
        <div class="documents form large-9 medium-8 columns content">
            <?= $this->Form->create($document,['type' => 'file']) ?>
            <fieldset>
                <!-- <legend><?= __('Add Document') ?></legend> -->

                <label class="control-label font-weight-bolder mandatory" for="project_id">Project
                    Name</label>
                <?php echo $this->Form->control('project_id', ['options' => $projects, 'label' => false]); ?>

                <label class="control-label font-weight-bolder mandatory" for="document_no">Document
                    ID</label>
                <div class="input-group mb-3"><input type="text" name="document_no" id="document_no" class="form-control" autocomplete="off">
                </div>

                <label class="control-label font-weight-bolder mandatory" for="document_type">Document
                    Type</label>
                <?php
                // echo $this->Form->control('document_no');
                echo $this->Form->Select(
                    'document_type',
                    [
                        "Sponsor's Agreement" => "Sponsor's Agreement",
                        "Donor's Agreement" => "Donor's Agreement",
                        "MDA's Agreement" => "MDA's Agreement",
                        'Other Agreement' => 'Other Agreement'
                    ],
                    ['empty' => 'Select Document Type', 'class' => 'mb-4', 'label' => false]
                ); ?>

                <label class="control-label font-weight-bolder mandatory" for="document_type">Click to
                    select a file to upload</label>
                <?php
                // echo $this->Form->control('date_uploaded');
                echo $this->Form->input('file_uploaded', ['type' => 'file', 'label' => false, 'class' => 'mb-4', 'accept'=>
                '.xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf']);
                ?>
                <div class="lg">
                    <legend class="text-gray-600 font-weight-bolder">Last Document Uploaded</legend>
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <td>Document Name</td>
                                <td>Document No</td>
                                <td>Document Type</td>
                                <td>Time Uploaded</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($lastFile)) : ?>
                                <tr>
                                    <td><?= h($lastFile->file_uploaded) ?></td>
                                    <td><?= h($lastFile->document_no) ?></td>
                                    <td><?= h($lastFile->document_type) ?></td>
                                    <td><?= h($lastFile->date_uploaded) ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if (isset($lastFile)) : ?>
                        <?= $this->Html->link(__('<legend class="text-gray-600  font-weight-bold">List of all Project Documents</legend>'), ['controller' => 'Projects', 'action' => 'documents', $id], [ 'escape' => false, 'title' => 'View all documents']) ?>

                    <?php endif; ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => "bg-primary"]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
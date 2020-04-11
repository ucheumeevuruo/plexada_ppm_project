<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pad $pad
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <?= $this->Html->link(__('<i class="fa fa-list-ol fa-sm"></i> List Pads'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-sm overlay', 'title' => 'List all Pads', 'escape' => false]) ?>
            <br />


            <div class="pads form large-9 medium-8 columns content">
                <?= $this->Form->create($pad) ?>
                <fieldset>
                    <legend><?= __('Add Pad') ?></legend>
                    <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('brief');
                    echo $this->Form->control('key_players', ['type' => 'dropdown']);
                    echo $this->Form->control('project_type');
                    echo $this->Form->control('project_target');
                    echo $this->Form->control('project_details');
                    echo $this->Form->control('project_amount');
                    echo $this->Form->control('currency');
                    echo $this->Form->control('due_date');
                    echo $this->Form->control('expected_outcome');
                    echo $this->Form->control('funding_agency');
                    echo $this->Form->control('conditions');
                    echo $this->Form->control('deadline');
                    echo $this->Form->control('heirarchy_of_objectiv');
                    echo $this->Form->control('objective_sub_category');
                    echo $this->Form->control('specific_oobjective');
                    echo $this->Form->control('first_oindicator');
                    echo $this->Form->control('second_oindicator');
                    echo $this->Form->control('third_oindicator');
                    echo $this->Form->control('forth_oindicator');
                    echo $this->Form->control('fifth_oindicator');
                    echo $this->Form->control('sixth_oindicator');
                    echo $this->Form->control('m_e_omethod');
                    echo $this->Form->control('critical_oassumptions');
                    echo $this->Form->control('specific_aobjective');
                    echo $this->Form->control('first_aindicator');
                    echo $this->Form->control('second_aindicator');
                    echo $this->Form->control('third_aindicator');
                    echo $this->Form->control('forth_aindicator');
                    echo $this->Form->control('fifth_aindicator');
                    echo $this->Form->control('sixth_aindicator');
                    echo $this->Form->control('m_e_amethod');
                    echo $this->Form->control('critical_aassumptions');
                    echo $this->Form->control('specific_mobjectives');
                    echo $this->Form->control('first_mindicator');
                    echo $this->Form->control('second_mindicator');
                    echo $this->Form->control('third_mindicator');
                    echo $this->Form->control('forth_mindicator');
                    echo $this->Form->control('fifth_mindicator');
                    echo $this->Form->control('sixth_mindicator');
                    echo $this->Form->control('m_e_mmethod');
                    echo $this->Form->control('critical_massumptions');
                    echo $this->Form->control('file_upload', ['type' => 'file']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
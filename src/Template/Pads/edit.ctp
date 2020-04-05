<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pad $pad
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pad->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pad->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pads'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pads form large-9 medium-8 columns content">
    <?= $this->Form->create($pad) ?>
    <fieldset>
        <legend><?= __('Edit Pad') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('brief');
            echo $this->Form->control('key_players');
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
            echo $this->Form->control('file_upload');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

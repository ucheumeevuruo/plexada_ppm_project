<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pim $pim
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pim->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pim->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pims'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pim Categories'), ['controller' => 'PimCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Category'), ['controller' => 'PimCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Mdas'), ['controller' => 'PimMdas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Mda'), ['controller' => 'PimMdas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Oversight Structures'), ['controller' => 'PimOversightStructures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Oversight Structure'), ['controller' => 'PimOversightStructures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Progress Reports'), ['controller' => 'PimProgressReports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Progress Report'), ['controller' => 'PimProgressReports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Project Action Plans'), ['controller' => 'PimProjectActionPlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Project Action Plan'), ['controller' => 'PimProjectActionPlans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Project Components'), ['controller' => 'PimProjectComponents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Project Component'), ['controller' => 'PimProjectComponents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Tasks'), ['controller' => 'PimTasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Task'), ['controller' => 'PimTasks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Total Expenditures'), ['controller' => 'PimTotalExpenditures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Total Expenditure'), ['controller' => 'PimTotalExpenditures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pim Work Plans'), ['controller' => 'PimWorkPlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pim Work Plan'), ['controller' => 'PimWorkPlans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pims form large-9 medium-8 columns content">
    <?= $this->Form->create($pim) ?>
    <fieldset>
        <legend><?= __('Edit Pim') ?></legend>
        <?php
            echo $this->Form->control('pim_approval_id');
            echo $this->Form->control('pim_category_id', ['options' => $pimCategories]);
            echo $this->Form->control('pim_mda_id', ['options' => $pimMdas]);
            echo $this->Form->control('date');
            echo $this->Form->control('brief');
            echo $this->Form->control('funding_agency');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pim $pim
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="container-fluid">
    <?= $this->Form->create($pim) ?>
    <fieldset>
        <legend><?= __('Add Pim') ?></legend>
        <?php
        
            echo $this->Form->control('date');
            echo $this->Form->control('brief');
            echo $this->Form->control('funding_agency');

            echo $this->Form->control('activities_achievement');
            echo $this->Form->control('risks_mitigation');
            echo $this->Form->control('activity_next_semester');
            echo $this->Form->control('total_expenditure');
            echo $this->Form->control('oversight_level');
            echo $this->Form->control('oversight_agency_mda');
            echo $this->Form->control('mda');
            echo $this->Form->control('rev_commitee_rep_information');
            echo $this->Form->control('approvers_agency');
            echo $this->Form->control('approvers_rep_information');
            echo $this->Form->control('approvers_date');
            echo $this->Form->control('signed_mou');
            echo $this->Form->control('adopted_minutes');
            echo $this->Form->control('financial_management');
            echo $this->Form->control('financial_template');
            echo $this->Form->control('parties');
            echo $this->Form->control('responsibilities');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('financial_cost');
            echo $this->Form->control('targets');
            echo $this->Form->control('activities');
            echo $this->Form->control('action');
            echo $this->Form->control('responsible_party');
            echo $this->Form->control('plan_start_date');
            echo $this->Form->control('plan_end_date');
            echo $this->Form->control('dependency');
            echo $this->Form->control('category');
            echo $this->Form->control('owner');
            echo $this->Form->control('currency');
            echo $this->Form->control('disbursed_amount');
            echo $this->Form->control('exp_output_date');
            echo $this->Form->control('task');
            echo $this->Form->control('progress_category');
            echo $this->Form->control('progress_currency');
            echo $this->Form->control('amount_credit_allocation');
            echo $this->Form->control('disbursed_current_semester');
            echo $this->Form->control('date_disbursement');
            echo $this->Form->control('cumulated_disbursment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

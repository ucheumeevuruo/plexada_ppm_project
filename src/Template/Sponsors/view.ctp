<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponsor $sponsor
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>
<div class="sponsors view large-9 medium-8 columns content">
    <h3><?= h($sponsor->full_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($sponsor->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($sponsor->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Names') ?></th>
            <td><?= h($sponsor->other_names) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($sponsor->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($sponsor->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($sponsor->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($sponsor->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone No') ?></th>
            <td><?= h($sponsor->phone_no) ?></td>
        </tr>
    </table>
    <div class="related">
        <?php if (!empty($sponsor->project_details)): ?>
         <h4><?= __('Related Projects') ?></h4>
        <table class="table table-striped table-sm table-responsive">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Budget') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Last Updated') ?></th>
            </tr>
            <?php foreach ($sponsor->project_details as $projectDetails): ?>
            <tr>
                <td><?= $projectDetails->has('project') ? $this->Html->link($projectDetails->project->name, ['controller' => 'projects', 'action' => 'report', $projectDetails->project_id]) : '' ?></td>
                <td><?= $projectDetails->has('project') ? $this->NumberFormat->format(
                        $projectDetails->budget,
                        ['before' => $projectDetails->has('currency') ? $projectDetails->currency->symbol : '']
                    ) : '0.00' ?></td>
                <td><?= $projectDetails->has('status') ? h($projectDetails->status->lov_value) : ''?></td>
                <td><?= h($projectDetails->start_dt) ?></td>
                <td><?= h($projectDetails->end_dt) ?></td>
                <td><?= h($projectDetails->created->format('d/m/yy')) ?></td>
                <td><?= h($projectDetails->last_updated->format('d/m/yy')) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

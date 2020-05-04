<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Milestone $milestone
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<div class="container-fluid" id="main">
    <div class="card shadow mb-4 " style="padding: 20px 20px 0 20px">
        <div class="me-dropdowns input-group mb-4" style="display: flex; justify-content:space-between;">

            <div class="milestones view large-9 medium-8 columns content">
                <h3><?= h($milestone->id) ?></h3>
                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Record Number') ?></th>
                        <td><?= h($milestone->record_number) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Project Detail') ?></th>
                        <td><?= $milestone->has('project_detail') ? $this->Html->link($milestone->project_detail->id, ['controller' => 'ProjectDetails', 'action' => 'view', $milestone->project_detail->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Payment') ?></th>
                        <td><?= h($milestone->payment) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Lov') ?></th>
                        <td><?= $milestone->has('lov') ? $this->Html->link($milestone->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $milestone->lov->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Description') ?></th>
                        <td><?= h($milestone->description) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Achievement') ?></th>
                        <td><?= h($milestone->achievement) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Trigger') ?></th>
                        <td><?= $milestone->has('trigger') ? $this->Html->link($milestone->trigger->lov_value, ['controller' => 'Lov', 'action' => 'view', $milestone->trigger->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($milestone->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Amount') ?></th>
                        <td><?= $this->Number->format($milestone->amount) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Completed Date') ?></th>
                        <td><?= h($milestone->completed_date) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Expected Completion Date') ?></th>
                        <td><?= h($milestone->expected_completion_date) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($milestone->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($milestone->modified) ?></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>
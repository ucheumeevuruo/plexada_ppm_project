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

<div class="container-fluid" id="main" style="display: flex;">
    <div class="card shadow mb-4 " style="padding: 20px 20px 0 20px; min-width: 35vw;">
        <div class="me-dropdowns input-group mb-4" style="display: flex; justify-content:space-between;">

            <div class="milestones view large-9 medium-8 columns content">
                <h3 class="text-center"><?= h($milestone->name) ?></h3>
                <table class="vertical-table">
                    <!-- write some line of code here -->
                    <tr>
                        <th scope="row"><?= __('Project Name') ?></th>
                        <td><?= $milestone->has('project') ? h($milestone->project->name) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Indicator Name') ?></th>
                        <td><?= h($milestone->name) ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Payment') ?></th>
                        <td>
                            <?php if ($milestone->payment == 'Y') : ?>
                                <?= h('Yes') ?>
                            <?php else : ?>
                                <?= h('No') ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Status') ?></th>
                        <td><?= $milestone->has('lov') ? h($milestone->lov->lov_value) : '' ?>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?= __('Description') ?></th>
                        <td><?= h($milestone->description) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Achievement') ?></th>
                        <td><?= $milestone->has('achievement') ? h($milestone->achievement) : 'No Achievement recorded' ?>

                    </tr>
                    <!-- <tr>
                        <th scope="row"><?= __('Trigger') ?></th>
                        <td><?= $milestone->has('trigger') ? h($milestone->trigger->lov_value) : '' ?>
                        </td>
                    </tr> -->
                    <tr>
                        <th scope="row"><?= __('Amount') ?></th>
                        <td><?= $this->Number->format($milestone->amount, ['before' => $milestone->project->project_detail->has('currency') ? $milestone->project->project_detail->currency->symbol : '']) ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Completed Date') ?></th>
                        <td><?= $milestone->has('completed_date') ? h($milestone->completed_date) : 'Not yet completed' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Expected Completion Date') ?></th>
                        <td><?= $milestone->has('expected_completion_date') ? h($milestone->expected_completion_date) : 'Not yet completed' ?></td>

                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($milestone->created->format('d/m/Y  H:i:s')) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($milestone->modified->format('d/m/Y  H:i:s')) ?></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
    <div class="card  mb-4 " style="background-color: #EDEEF1; outline: 2px solid #D1D3E2">
        <h1 class="text-center">Activities</h1>
        <table class="table-responsive">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Task</th>
                    <th>Start Date</th>
                    <th>Finish Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 0; ?>
                <?php foreach ($milestone->activities as $activity) : ?>
                    <?php $num++; ?>
                    <?php if (h($activity->status_id, ['controller' => 'activities'] == 1)) {
                        $status = 'Open';
                    } elseif (h($activity->status_id, ['controller' => 'activities'] == 1)) {
                        $status = 'Not yet started';
                    } else {
                        $status = 'Close';
                    }
                    ?>
                    <p class="card-text">
                    </p>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
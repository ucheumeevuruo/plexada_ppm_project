<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailOld $projectDetail
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<?php echo $this->Html->css('report'); ?>

<div class="container-fluid">

    <div class="card-deck">
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Summary', ['controller' => 'projects', 'action' => 'report', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Indicators', ['controller' => 'projects', 'action' => 'milestones', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav active"
            style=" font-size: 20px;">Activities</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Resources</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Partners', ['controller' => 'projectDetails', 'action' => 'partners', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Risks & Issues', ['controller' => 'projects', 'action' => 'riskIssues', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Gantt
            Charts</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav" style=" font-size: 20px;">
            <?= $this->Html->link('Documents', ['controller' => 'projects', 'action' => 'documents', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>


    </div>
    <div class="card-body">

        <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?> Activities
        </h2>



        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" class="table table-bordered  table-hover table-primary br-m"
                role="grid" aria-describedby="dataTable_info">
                <thead class="bg-primary br-t">
                    <tr>
                        <th scope="col" width="3%"><?= __('S/N') ?></th>
                        <th scope="col" width="20%"><?= __('Activity') ?></th>
                        <th scope="col" width="8%"><?= __('Status') ?></th>
                        <th scope="col" width="12%"><?= __('Start Date') ?></th>
                        <th scope="col" width="12%"><?= __('End Date') ?></th>
                        <th scope="col" width="15%"><?= __('Assigned To') ?></th>
                        <th scope="col" width="20%"><?= __('Next Activity') ?></th>
                        <th scope="col" width="15%"><?= __('Task') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 0; ?>
                    <?php foreach ($project->activities as $activity) : ?>
                    <?php $num++; ?>
                    <?php if (h($activity->status_id, ['controller' => 'activities'] == 1)) {
                            $status = 'Open';
                        } elseif (h($activity->status_id, ['controller' => 'activities'] == 1)) {
                            $status = 'Not yet started';
                        } else {
                            $status = 'Close';
                        }
                        ?>
                    <tr>
                        <td><?= h($num) ?></td>
                        <td> <?= $this->Html->link($activity->description, ['controller' => 'activities', 'action' => 'view', $activity->activity_id]) ?>
                        </td>
                        <td><?= h($status) ?></td>
                        <td><?= h($activity->created) ?> </td>
                        <!-- <td><?= h($activity->milestones->expected_completion_date) ?></td> -->
                        <td></td>
                        <td><?= h($activity->assigned_to_id) ?></td>
                        <td><?= h($activity->next_activity) ?></td>


                        <td> <?= $this->Html->link('list of Tasks', ['controller' => 'activities', 'action' => 'tasks',  $activity->activity_id], ['id' => 'transmit']) ?>
                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
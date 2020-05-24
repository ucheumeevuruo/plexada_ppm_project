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
            <?= $this->Html->link('Summary', ['controller' => 'projects', 'action' => 'report', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Indicators', ['controller' => 'projects', 'action' => 'milestones', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Resources</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav active"
            style=" font-size: 20px;">Partners</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Risks & Issues', ['controller' => 'projects', 'action' => 'riskIssues', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Gantt
            Charts</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav"
            style=" font-size: 20px;">Documents</span>


    </div>
    <!-- <?= h($projectDetails->projects->id) ?> -->
    <div class="card-body">

        <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($projectDetails->name) ?> Partners
        </h2>

        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" class="table table-bordered  table-hover table-primary br-m"
                role="grid" aria-describedby="dataTable_info">
                <thead class="bg-primary br-t">
                    <tr>
                        <th scope="col" width="3%"><?= __('S/N') ?></th>
                        <th scope="col" width="15%"><?= __('Last Name') ?></th>
                        <th scope="col" width="15%"><?= __('First Name') ?></th>
                        <th scope="col" width="20%"><?= __('Email') ?></th>
                        <th scope="col" width="12%"><?= __('Phone Number') ?></th>
                        <th scope="col" width="20%"><?= __('Address') ?></th>
                        <!-- <th scope="col" width="10%"><?= __('Amount Committed') ?></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 0; ?>
                    <?php foreach ($projectDetails->sponsors as $sponsor) : ?>
                    <?php $num++; ?>

                    <tr>
                        <td><?= h($num) ?></td>
                        <td><?= h($sponsor->last_name) ?></td>
                        <td><?= h($sponsor->first_name) ?></td>
                        <td><?= h($sponsor->email) ?></td>
                        <td><?= h($sponsor->phone_no) ?></td>
                        <td><?= h($sponsor->address) ?></td>
                        <!-- <td><?= h($projectDetails->sponsor_id) ?></td> -->

                        <div class="row m-3">
                            <?php foreach ($projectDetails->sponsors as $sponsor) : ?>
                            <?php if (isset($sponsor)) : ?>


                </tbody>
            </table>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */

use Cake\ORM\Query;
use Cake\Datasource\ConnectionManager;

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
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold nav" style=" font-size: 20px;">
            <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav"
            style=" font-size: 20px;">Resources</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav" style=" font-size: 20px;">
            <?= $this->Html->link('Partners', ['controller' => 'projectDetails', 'action' => 'partners', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav"
            style=" font-size: 20px;">Gantt
            Charts</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav active"
            style=" font-size: 20px;">Documents</span>

    </div>
    <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?> </h2>
    <div class="card-body docs">
        <div class="table-responsive ">
            <h4 class="font-weight-bold">Project Documents</h4>
            <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable table-hover table-primary br-m"
                role="grid" aria-describedby="dataTable_info">
                <thead class="bg-primary br-t">
                    <tr>
                        <th scope="col" width='15%'><?= __('S/N') ?></th>
                        <th scope="col"><?= __('Document Title') ?></th>
                        <th scope="col"><?= __('Date Uploaded') ?></th>
                        <th scope="col"><?= __('Document ID') ?></th>
                        <th scope="col"><?= __('Document Type') ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php $num = 0; ?>
                <?php foreach ($project->documents as $document) : ?>
                <?php $num++; ?>

                    <tr>
                    <td><?= h($num) ?></td>
                        <td><?= h($document->file_uploaded) ?></td>
                        <td><?= h($document->date_uploaded) ?></td>
                        <td><?= h($document->document_no) ?></td>
                        <td><?= h($document->document_type) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link('<i class="fa fa-plus fa-lg"></i>', ['controller' => 'documents', 'action' => 'add', $project->id], ['id' => 'transmit', 'class' => 'nav-col', 'class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>

                </div>
            </table>
        </div>
    </div>
</div>
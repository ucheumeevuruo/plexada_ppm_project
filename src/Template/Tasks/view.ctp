<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tasks $task
 * 
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

            <br />
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <a class="nav-link active" href="#"><?= __('Task') ?></a>

                    <table class="table table-borderless no-border">
                        <tr>
                            <th scope="row"><?= __('Task name') ?></th>
                            <td><?= h($task->Task_name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('start Date') ?></th>
                            <td><?= h($task->Start_date) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('end Date') ?></th>
                            <td><?= h($task->end_date) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Description') ?></th>
                            <td><?= h($task->Description) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Predecessor') ?></th>
                            <td><?= h($task->Predecessor) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Successor') ?></th>
                            <td><?= h($task->Successor) ?></td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
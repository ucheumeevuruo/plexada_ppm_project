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




<div class="mb-4 br-m shad">
    <div class="py-3 pl-3 bg-default br-t">
        <div class="card-deck mb-3">
            <?php $num = 0; ?>
            <?php foreach ($activity->tasks as $activities) : ?>
            <?php $num++; ?>

            <div class="card card-outline shadow">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-primary">Task <?= h($num) ?></h5>
                    <p class="card-text">
                        <?= $this->Html->link($activities->Task_name, ['controller' => 'tasks', 'action' => 'view', $activities->task_id],) ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
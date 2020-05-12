<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Objective $objective
 */
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
?>

<div class="objectives view large-9 medium-8 columns content">
    <h3><?= h($objective->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $objective->has('project') ? $this->Html->link($objective->project->name, ['controller' => 'Projects', 'action' => 'view', $objective->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Objective') ?></th>
            <td><?= h($objective->objective) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($objective->id) ?></td>
        </tr>
    </table>
</div>

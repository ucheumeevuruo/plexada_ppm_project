<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PimProjectComponent $pimProjectComponent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pim Project Component'), ['action' => 'edit', $pimProjectComponent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pim Project Component'), ['action' => 'delete', $pimProjectComponent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pimProjectComponent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pim Project Components'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim Project Component'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pims'), ['controller' => 'Pims', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pim'), ['controller' => 'Pims', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pimProjectComponents view large-9 medium-8 columns content">
    <h3><?= h($pimProjectComponent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pim') ?></th>
            <td><?= $pimProjectComponent->has('pim') ? $this->Html->link($pimProjectComponent->pim->id, ['controller' => 'Pims', 'action' => 'view', $pimProjectComponent->pim->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activities Achievements') ?></th>
            <td><?= h($pimProjectComponent->activities_achievements) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Risks Mitigations') ?></th>
            <td><?= h($pimProjectComponent->risks_mitigations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activity Next Semester') ?></th>
            <td><?= h($pimProjectComponent->activity_next_semester) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pimProjectComponent->id) ?></td>
        </tr>
    </table>
</div>

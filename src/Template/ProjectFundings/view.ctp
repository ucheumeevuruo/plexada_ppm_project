<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectFunding $projectFunding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Funding'), ['action' => 'edit', $projectFunding->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Funding'), ['action' => 'delete', $projectFunding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectFunding->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Fundings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Funding'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Milestones'), ['controller' => 'Milestones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Milestone'), ['controller' => 'Milestones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectFundings view large-9 medium-8 columns content">
    <h3><?= h($projectFunding->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Milestone') ?></th>
            <td><?= $projectFunding->has('milestone') ? $this->Html->link($projectFunding->milestone->id, ['controller' => 'Milestones', 'action' => 'view', $projectFunding->milestone->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectFunding->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Id') ?></th>
            <td><?= $this->Number->format($projectFunding->project_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funding') ?></th>
            <td><?= $this->Number->format($projectFunding->funding) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($projectFunding->projects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Introduction') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projectFunding->projects as $projects): ?>
            <tr>
                <td><?= h($projects->id) ?></td>
                <td><?= h($projects->name) ?></td>
                <td><?= h($projects->introduction) ?></td>
                <td><?= h($projects->location) ?></td>
                <td><?= h($projects->cost) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

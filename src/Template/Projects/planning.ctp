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

/**
 *
 * This section is used to customize the pagination area.
 * Do not tamper with if you have not read the document https://book.cakephp.org/3/en/controllers/components/pagination.html
 *
 */

?>

<div class="container-fluid mt-4">
    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'index']) ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Planning</li>
        </ol>
    </nav>

    <h2 class="text-primary text-left font-weight-bold mt-3">Select Project
        <!-- <?php echo $this->Form->control('project_id', ['options' => $projects, 'label' => false]); ?></h2> -->

        <div class="grey-bg vh-4 py-4">
            <?php foreach ($projects as $project) : ?>
            <h6>
                <!-- <?= h($project->name) ?> -->
                <?= $this->Html->link(__($project->name), ['action' => 'plan', $project->id]) ?>

            </h6>
            <?php endforeach; ?>

        </div>
</div>
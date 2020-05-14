<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<div class="container-fluid  mt-4">

    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'index'])?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Create Project</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->
<section id="flyby">
    <div class="projects container-fluid w-75 mx-auto mb-4">
        <?= $this->Form->create($project) ?>
        <fieldset>
            <?php
            echo $this->Form->control('name', ['autocomplete' => 'off']);
            echo $this->Form->control('introduction', ['label' => 'Brief', 'type'=> 'textarea']);
            echo $this->Form->hidden('project_detail.status_id', ['value' => 1]);
            echo $this->Form->control('location');
            echo $this->Form->control('cost',['label'=>'Budget(USD)']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ["class" => "btn-primary"]) ?>
        <?= $this->Form->end() ?>
    </div>
</section>
</div>
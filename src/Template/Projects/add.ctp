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
<?php echo $this->Html->css('mandatory'); ?>


<div class="container-fluid  mt-4">

    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'index']) ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Create Project</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->
    <section id="flyby">
        <div class="projects container-fluid  mx-auto mb-4">
            <?= $this->Form->create($project) ?>
            <fieldset class="col-md-6 float-left mb-4">
                <!-- <legend class="text-primary">Project Information</legend> -->
                <label class="control-label mandatory font-weight-bolder" for="project">Project
                    Name</label>
                <div class="input-group mb-3"><input type="text" name="name" id="name" class="form-control" empty="1"
                        autocomplete="off">
                </div>

                <label class="control-label mandatory font-weight-bolder" for="description">Brief</label>
                <div class="input-group mb-3">
                    <textarea name="introduction" class="form-control" empty="1" id="introduction"
                        autocomplete="off"> </textarea>
                </div>

            </fieldset>
            <fieldset class="col-md-6 float-right mb-4">
                <label class="control-label mandatory font-weight-bolder" for="location">Location</label>
                <div class="input-group mb-3"><input type="text" name="location" class="form-control" empty="1"
                        id="location" autocomplete="off">
                </div>


                <?php
                // echo $this->Form->control('name', ['autocomplete' => 'off']);
                // echo $this->Form->control('introduction', ['label' => 'Brief', 'type' => 'textarea']);
                echo $this->Form->hidden('project_detail.status_id', ['value' => 1]);
                // echo $this->Form->control('location');
                ?>
                <label class="control-label mandatory font-weight-bolder"
                    for="project_detail.currency_id">Currency</label>
                <?php
                echo $this->Form->control('project_detail.currency_id', ['options' => $currencies, 'empty' => true, 'label' => false, 'class' => 'mb-0']);
                ?>
                <label class="control-label mandatory font-weight-bolder"
                    for="project_detail.currency_id">Budget</label>
                <?php
                echo $this->Form->control('project_detail.budget', ['label' => false, 'class' => 'mb-0']);
                ?>
                <!-- <label class="control-label mandatory" for="project_detail.budget">Budget</label>
                <div class="input-group mb-3"><input type="number" name="project_detail.budget" class="form-control"
                        empty="1" id="project_detail.budget" autocomplete="off">
                </div> -->
            </fieldset>
            <?= $this->Form->button(__('Submit'), ["class" => "btn-primary"]) ?>
            <?= $this->Form->end() ?>
            <!-- <?= $this->Form->button(' Cancel ', ['type' => 'button', 'onclick' => 'location.href=\'/projects\'', 'class' => 'btn-danger']) ?> -->
        </div>
    </section>
</div>
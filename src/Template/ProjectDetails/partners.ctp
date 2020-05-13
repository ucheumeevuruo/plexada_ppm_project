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

<!-- <?php echo $this->Html->css('report'); ?> -->


<div class="container-fluid  mt-4">

    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'index'])?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Partners</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->

    <!-- Navigation area -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <?= $this->Html->link('Summary', ['controller' => 'projects', 'action' => 'report', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Indicators', ['controller' => 'projects', 'action' => 'milestones', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Resources', [], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Partners', [], ['id' => 'transmit', 'class' => 'nav-link active']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Gantt Charts', [], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Documents', ['controller' => 'projects', 'action' => 'documents', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-link ']) ?>
        </li>
    </ul>
    <!-- ./end Navigation area -->

    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Partners</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="row m-3">
        <?php $num = 0; ?>
        <?php foreach ($projectDetails->sponsors as $sponsor) : ?>
        <?php $num++; ?>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card  shadow h-100 py-0">
                <div class="card-body py-2 px-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2" id="clickable-card" data-attr="">
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <p><i style="color: blue;">Last Name: </i><?= h($sponsor->last_name) ?></p>
                                <p><i style="color: blue;">First Name: </i><?= h($sponsor->first_name) ?></p>
                                <p><i style="color: blue;">Email: </i><?= h($sponsor->email) ?></p>
                                <p><i style="color: blue;">Phone Number: </i><?= h($sponsor->phone_no) ?></p>
                                <p><i style="color: blue;">Address: </i><?= h($sponsor->address) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
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


<div class="container-fluid  mt-4">

    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'index'])?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Gantt Charts</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->

    <!-- Navigation area -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <?= $this->Html->link('Summary', ['action' => 'report', $id], ['id' => 'transmit', 'class' => 'nav-link ']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Indicators', ['controller' => 'projects', 'action' => 'milestones', $id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Resources', [], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Partners', ['controller' => 'projectDetails', 'action' => 'partners', $id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Gantt Charts', ['controller' => 'projects','action' => 'gantt_chart', $id], ['id' => 'transmit', 'class' => 'nav-link active']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Documents', [ 'action' => 'documents', $id], ['id' => 'transmit', 'class' => 'nav-link ']) ?>
        </li>
    </ul>
    <!-- ./end Navigation area -->

    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Gantt Charts</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>



    <?= $this->Html->script('Chart.min.js') ?>
    <?= $this->Html->script('mychart.js') ?>

    <div class="card-body">

        <div class="row">
            <div class="col">
                <div class="card shadow mb-5">
                    <!-- Card Header - Dropdown -->

                    <!-- Gantt Chart -->
                    <div class="card-body">
                        <div id="container3">
                            <div id="ganttcontainer2" style="height: 500px; width: 100%">
                                <script>
                                <?php $obj_array = json_encode($ganttDetails) ?>
                                    var array_code2 = <?php echo $obj_array; ?> ;
                                ganttProject2(array_code2);
                                // console.log(array_code2)
                                </script>
                            </div>
                        </div>

                        <div class="mt-4 text-center small status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
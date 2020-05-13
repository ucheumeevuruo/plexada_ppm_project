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

<?php echo $this->Html->css('report'); ?>

<div class="container-fluid">
    <div class="card-deck">
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav "
            style=" font-size: 20px;">Summary</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Indicators', ['controller' => 'projects', 'action' => 'milestones', $id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold nav" style=" font-size: 20px;">
            <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav"
            style=" font-size: 20px;">Resources</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav" style=" font-size: 20px;">
            <?= $this->Html->link('Partners', ['controller' => 'projectDetails', 'action' => 'partners', $id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>

        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav active"
            style=" font-size: 20px;">
            <?= $this->Html->link('Gantt Chart', ['controller' => 'projects', 'action' => 'ganttChart', $id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
            </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav" style=" font-size: 20px;">
            <?= $this->Html->link('Documents', ['controller' => 'projects', 'action' => 'documents', $id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>

    </div>

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
                                var array_code2 = <?php echo $obj_array; ?>;
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
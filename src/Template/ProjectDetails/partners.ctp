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
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Summary', ['controller' => 'projects', 'action' => 'report', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Indicators', ['controller' => 'projects', 'action' => 'milestones', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Resources</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav active"
            style=" font-size: 20px;">Partners</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Gantt
            Charts</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav" style=" font-size: 20px;">
            <?= $this->Html->link('Documents', ['controller' => 'projects', 'action' => 'documents', $projectDetails->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>

    </div>
    <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($projectDetails->name) ?>
    </h2>



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
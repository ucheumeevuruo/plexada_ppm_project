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

echo $this->Html->css('mandatory');

/**
 *
 * This section is used to customize the pagination area.
 * Do not tamper with if you have not read the document https://book.cakephp.org/3/en/controllers/components/pagination.html
 *
 */
$this->Paginator->setTemplates([
    'number' => '',
    'nextActive' => '<li class="nav-item"><a class="nav-link navigator" href="{{url}}">{{text}}</a></li>',
    'nextDisabled' => '<li class="nav-item"><a class="nav-link text-gray-300 unclickable" href="#">{{text}}</a></li>',
    'prevActive' => '<li class="nav-item"><a class="nav-link navigator" href="{{url}}">{{text}}</a></li>',
    'prevDisabled' => '<li class="nav-item"><a class="nav-link text-gray-300 unclickable" href="#">{{text}}</a></li>',
    'first' => '',
    'last' => ''
]);
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<?= $this->Html->script('mychart.js') ?>
<div class="container-fluid mt-4">
    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'preImplementation']) ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Disbursement</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->


    <!-- Navigation area -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <?= $this->Html->link('Summary', ['action' => 'report', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Indicators', ['action' => 'milestones', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Activities', ['action' => 'activities', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Disbursement', ['action' => 'disburse', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Gantt Chart', ['action' => 'gantt_chart', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Documents', ['action' => 'documents', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Health', ['action' => 'startedTask', $project->id], ['id' => 'transmit', 'class' => 'nav-link active']) ?>
        </li>
    </ul>
    <!-- ./end Navigation area -->


    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <p class="navbar-brand" href="#">Total Amount Disbursed</p>

    </nav>

    <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?>
    </h2>
    <div class="grey-bg vh-4 py-4">

        <div class="ml-3">
            <h5 class="ml-3"><?= h('Indicators Summary')?></h5>
            <table class="table">
                <thead>
                    <tr>
                        <td>Total Number of Indicators</td>
                        <td>Number of Open</td>
                        <td>Number of Started</td>
                        <td>Number of Close</td>
                        <td>Those that needs attention</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= h($total) ?></td>
                        <td><?= h($openIndicators) ?></td>
                        <td><?= h($startedIndicators) ?></td>
                        <td><?= h($closedIndicators) ?></td>
                        <td><?= h($attentionIndicators) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
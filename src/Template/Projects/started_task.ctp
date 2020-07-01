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
            <h4 class="text-primary text-left font-weight-bold">Summary</h4>

            <table class="table table-responsive table-condensed text-center">
                <thead class="table-dark">
                    <tr>
                        <td>Budget</td>
                        <td>Total Disbursed</td>
                        <td>Total funds received</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <?= $this->Number->format($project->project_detail->budget, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?> </td>
                        <td> <?= $this->Number->format($totalDisbursed, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?> </td>
                        <td> <?= $this->Number->format($totalReceived, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?> </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="ml-3">
            <h4 class="text-primary text-left font-weight-bold mt-3">Money Released for Indicators</h4>

            <table class="table table-responsive table-condensed text-center table-md">

                <thead class="table-dark">
                    <tr>
                        <td>S/N</td>
                        <td>Indicator Name</td>
                        <td>Budget</td>
                        <td>Amount Disbursed</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    <?php foreach ($project->disbursements as $disburse) : ?>
                        <tr>
                            <td><?= h($num++) ?></td>

                            <td><?= h($disburse->milestone->name) ?></td>
                            <td class="text-right"> <?= $this->Number->format($disburse->milestone->amount, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?> </td>
                            <td class="text-right"> <?= $this->Number->format($disburse->cost, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?> </td>

                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td></td>
                        <td class="text-right"> <?= $this->Number->format($totalDisbursed, ['before' => $project->project_detail->has('currency') ? $project->project_detail->currency->symbol : '']) ?> </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="ml-3">
            <h4 class="text-primary text-left font-weight-bold mt-3">Indicators Summary</h4>
            <table class="table table-responsive table-condensed text-center">
                <thead class="table-dark">
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


        <div class="ml-3">
            <h4 class="text-primary text-left font-weight-bold mt-3">Activities Summary</h4>

            <table class="table table-responsive table-condensed text-center table-md">

                <thead class="table-dark">
                    <tr>
                        <td>Total Number of Activities</td>
                        <td>Number of Open</td>
                        <td>Number of Started</td>
                        <td>Number of Close</td>
                        <td>Those that needs attention</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= h($totalActivities) ?></td>
                        <td><?= h($openActivities) ?></td>
                        <td><?= h($startedActivities) ?></td>
                        <td><?= h($closedActivities) ?></td>
                        <td><?= h($attentionActivities) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="ml-3">
            <h4 class="text-primary text-left font-weight-bold mt-3">Tasks Summary</h4>

            <table class="table table-responsive table-condensed text-center table-md">
                <thead class="table-dark">
                    <tr>
                        <td>Total Number of Tasks</td>
                        <td>Number of Open</td>
                        <td>Number of Started</td>
                        <td>Number of Close</td>
                        <td>Those that needs attention</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= h($totalTasks) ?></td>
                        <td><?= h($openTasks) ?></td>
                        <td><?= h($startedTasks) ?></td>
                        <td><?= h($closedTasks) ?></td>
                        <td><?= h($attentionTasks) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
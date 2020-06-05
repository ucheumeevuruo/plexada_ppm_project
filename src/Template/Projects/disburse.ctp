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

<div class="container-fluid mt-4">
    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'index']) ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Disbursement</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->


    <!-- Navigation area -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <?= $this->Html->link('Summary', ['action' => 'report', $id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Indicators', ['action' => 'milestones', $id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Activities', ['action' => 'activities', $id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Disbursement', [], ['id' => 'transmit', 'class' => 'nav-link active']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Gantt Chart', ['action' => 'gantt_chart', $id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Documents', ['action' => 'documents', $id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
    </ul>
    <!-- ./end Navigation area -->


    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <p class="navbar-brand" href="#">Total Amount Disbursed</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </nav>
    <div class="grey-bg vh-4 py-4">
        <h5 class="ml-3 text-sm font-weight-bold  ">Total Expected:  <?= $this->NumberFormat->format($projectDetails->budget, ['before' => $milestone->project->project_detail->has('currency') ? $milestone->project->project_detail->currency->symbol : '']) ?></h5>
        <h5 class="ml-3 text-sm font-weight-bold  ">Total Disbursed:  <?= $this->NumberFormat->format($amount_dis, ['before' => $milestone->project->project_detail->has('currency') ? $milestone->project->project_detail->currency->symbol : '']) ?></h5>
        <h6 class="ml-3"><u>Details:</u></h6>
        <table class="table table-bordered ml-3">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Date Disbursed</th>
                </tr>

            </thead>
            <tbody>
                <?php $num = 0; ?>
                <?php foreach ($disbursed as $disb) : ?>
                    <?php $num++; ?>
                    <tr>
                        <td><?= h($num) ?></td>
                        <td><?= h($disb->name) ?></td>
                        <td><?= h($disb->description) ?></td>
                        <td><?= $this->NumberFormat->format($disb->cost, ['before' => $milestone->project->project_detail->has('currency') ? $milestone->project->project_detail->currency->symbol : '']) ?></td>
                        <td><?= h($disb->created) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>


    </div>
</div>
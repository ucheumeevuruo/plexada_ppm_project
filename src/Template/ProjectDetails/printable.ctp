<nav class="float-right">
    <button class="btn btn-info">
        <?= $this->Html->link(__('<i class="fa fa-backward"> Back</i>'), ['action' => 'evaluation'], ['label' => false, 'escape' => false, 'title' => 'Go back', 'class' => 'text-light font-weight-bold']) ?>
    </button>
    <button class="btn btn-info"><i class="fa fa-save"> Save As</i> </button>
    <button class="btn btn-info"><i class="fa fa-print"> Print</i> </button>
</nav>

<div style=" width: 1000px; margin-left: 200px;" id="report">
    <div class="align-self-center">
        <h4 class="d-flex justify-content-center bold"><strong>OGUN STATE GOVERNMENT</strong></h4>
        <h4 class="d-flex justify-content-center bold"><strong>DEVELOPMENT PARTNERS COORDINATION</strong></h4>
        <h4 class="d-flex justify-content-center bold"><strong>PROJECT REPORT </strong></h4>
        <hr style="height: 10px;">
    </div>
    <div>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">PROJECT NAME: &nbsp; <strong class="text-capitalize"> <?= h($projectDetails->name) ?></strong></P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">DESCRIPTION OF PROJECT: &nbsp;
            <strong><?= h($projectDetails->description) ?>
            </strong>
        </P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">DONOR: &nbsp;
            <strong><?= h($sponsors->first_name . ' ' . $sponsors->last_name) ?>
            </strong>
        </P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">FUNDING TYPE:
            <strong><?= h($projectDetails->funding_type) ?></strong></P>

        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">BUDGET AMOUNT: &nbsp;
            <strong><?= $this->NumberFormat->format($projectDetails->budget, ['before' => $projectDetails->has('currency') ? $projectDetails->currency->symbol : '']) ?></strong></P>
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">DISBURSEMENT TO DATE:
            <strong><?= $this->NumberFormat->format($amountDisbursed, ['before' => $projectDetails->has('currency') ? $projectDetails->currency->symbol : '']) ?> </strong>

        </P>
        <!-- <P class="mb-0 font-weight-bold" style="margin-left: 100px;">COUNTERPART FUND REQUIRED: &nbsp;
            <strong></strong></P> -->
        <P class="mb-0 font-weight-bold" style="margin-left: 100px;">BENEFICIARY:
            <strong><?= h($projectDetails->beneficiary) ?> </strong>
        </P>
        <P class="mb-2 font-weight-bold" style="margin-left: 100px;">DATE OF REPORT: &nbsp;
            <strong><?= h(date('l jS\, F Y')) ?></strong></P>
    </div>
    <div style="width: 900px;">
        <p style="margin-left: 100px" class="font-weight-bold">Project Indicators</p>
        <table style="margin-left: 100px; outline: 1px solid black;" cellpadding="0" cellspacing="0" class="table table-sm table-bordered br-m">
            <thead class="bg-default" style="outline: 1px solid black;">
                <tr>
                    <th style="outline: 1px solid black; color: black !important; width:5%;">S/N</th>
                    <th style="outline: 1px solid black; color: black !important;">Indicator Name</th>
                    <th style="outline: 1px solid black; color: black !important;">Indicator Description</th>
                    <th style="outline: 1px solid black; color: black !important;">Indicator Cost</th>
                    <th style="outline: 1px solid black; color: black !important;">Indicator Status</th>
                    <th style="outline: 1px solid black; color: black !important;">Deadline</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 0; ?>
                <?php foreach ($milestones as $milestone) : ?>
                    <?php $num++; ?>

                    <tr>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($num) ?>.</td>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($milestone->name) ?> </td>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($milestone->description) ?> </td>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= $this->NumberFormat->format($milestone->amount, ['before' => $projectDetails->has('currency') ? $projectDetails->currency->symbol : '']) ?> </td>
                        <?php if ($milestone->status_id == 1) : ?>
                            <td class="ml-2" style="outline: 1px solid black; color: black !important;">
                                <?= h('Open') ?>
                            </td>
                        <?php else : ?>
                            <td class="ml-2" style="outline: 1px solid black; color: black !important;">
                                <?= h('Close') ?>
                            </td>
                        <?php endif; ?>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($milestone->end_date) ?> </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <p style="margin-left: 100px" class="font-weight-bold">Activity Report</p>
        <table style="margin-left: 100px;" cellpadding="0" cellspacing="0" class="table table-sm table-bordered br-m">
            <thead class="bg-default">
                <tr>
                    <th style="outline: 1px solid black; color: black !important; width:5%;">S/N</th>
                    <th style="outline: 1px solid black; color: black !important; ">Activity Name</th>
                    <th style="outline: 1px solid black; color: black !important; ">Indicator Name</th>
                    <th style="outline: 1px solid black; color: black !important; ">Activity Cost</th>
                    <th style="outline: 1px solid black; color: black !important;">Activity Status</th>
                    <th style="outline: 1px solid black; color: black !important;">Deadline</th>
                </tr>
            </thead>
            <tbody>
                <?php $num1 = 0; ?>
                <?php foreach ($activities as $activity) : ?>
                    <?php $num1++; ?>
                    <tr>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($num1) ?>.</td>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($activity->name) ?> </td>
                        <?php foreach ($milestones as $milestone) : ?>
                            <?php if ($activity->milestone_id == $milestone->id) : ?>
                                <td style="outline: 1px solid black; color: black !important;"><?= h($milestone->name) ?> </td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= $this->NumberFormat->format($activity->cost, ['before' => $projectDetails->has('currency') ? $projectDetails->currency->symbol : '']) ?> </td>
                        <?php if ($activity->status_id == 1) : ?>
                            <td class="ml-2" style="outline: 1px solid black; color: black !important;">
                                <?= h('Open') ?>
                            </td>
                        <?php else : ?>
                            <td class="ml-2" style="outline: 1px solid black; color: black !important;">
                                <?= h('Close') ?>
                            </td>
                        <?php endif; ?>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($activity->end_date) ?> </td>
                    </tr>

                <?php endforeach; ?>


            </tbody>
        </table>


        <p style="margin-left: 100px" class="font-weight-bold">Task Report</p>
        <table style="margin-left: 100px;" cellpadding="0" cellspacing="0" class="table table-sm table-bordered br-m">
            <thead class="bg-default">
                <tr>
                    <th style="outline: 1px solid black; color: black !important; width:5%;">S/N</th>
                    <th style="outline: 1px solid black; color: black !important; ">Task Name</th>
                    <th style="outline: 1px solid black; color: black !important; ">Activity Name</th>
                    <th style="outline: 1px solid black; color: black !important; ">Description</th>
                    <th style="outline: 1px solid black; color: black !important;">Predecessor</th>
                    <th style="outline: 1px solid black; color: black !important;">Successor</th>
                </tr>
            </thead>
            <tbody>
                <?php $num4 = 1; ?>
                <?php foreach ($tasks as $task) : ?>
                    <?php foreach ($activities as $activity) : ?>
                        <?php if ($task->activity_id == $activity->activity_id) : ?>
                            <tr>
                                <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($num4++) ?>.</td>
                                <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($task->Task_name) ?> </td>
                                <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($activity->name) ?> </td>
                                <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($task->Description) ?> </td>
                                <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($task->Predecessor) ?> </td>
                                <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($task->Successor) ?> </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <div>
        <h6 style="font-weight:bolder; margin-left: 100px;" class="font-weight-bold">CHALLENGES/ISSUES:</h6>
    </div>
    <div style="width: 900px;">
        <p style="margin-left: 100px" class="font-weight-bold">Next Step/Action Plan: </p>
        <table style="margin-left: 100px; padding-right: 100px;" cellpadding="0" cellspacing="0" class="table table-sm table-bordered br-m">
            <thead class="bg-default">
                <tr>
                    <th style="width:5%; outline: 1px solid black; color: black !important;">S/N</th>
                    <th style="outline: 1px solid black; color: black !important;">Activity Name</th>
                    <th style="outline: 1px solid black; color: black !important;">Next Step/ Action Plan</th>
                    <th style="outline: 1px solid black; color: black !important;">Timeline</th>
                </tr>
            </thead>
            <tbody>
                <?php $num3 = 0; ?>
                <?php foreach ($activities as $activity) : ?>
                    <?php $num3++; ?>
                    <tr>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($num3) ?>.</td>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($activity->name) ?> </td>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;"><?= h($activity->next_activity) ?> </td>
                        <td class="ml-2" style="outline: 1px solid black; color: black !important;">
                            <?php
                            $date2 = $activity->start_date;
                            $date1 = $activity->end_date;
                            $date3 = $date1->diff($date2)->format("%a");
                            ?>
                            <?= h($date3) ?> days
                        </td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
        <p style="margin-left: 100px" class="font-weight-bold">Prepared by: </p>
        <br>
        <p style="margin-left: 100px; margin-bottom: 100px;" class="font-weight-bold"> State Programme Coordinator
        </p>
    </div>
</div>



<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pim $pim
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<style>

.ulmargin{
    margin-left : 50px !Important;
}

</style>

<div class="container-fluid">
    <div class="card shadow mb-4">

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right mt-3">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <!-- <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button> -->
            <?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i> Edit'), ['action' => 'edit', $pim->id], ['class' => 'btn btn-primary btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>
          </p>
          <div class="jumbotron">
            <h1><?= h($pim->brief) ?></h1>
            <p>Dated : <?= h($pim->date->format('d-M-Y')) ?></p>
            <p>Funded by  : <?= h($pim->funding_agency) ?></p>
          </div>
          <div class="row">
          <section id="ProjectComponent">
          <div class="col-xs-6 col-lg-12">
          <h2>Project Component</h2>
              <p>Activities Achievement</p>
              <ul class="ulmargin">
                <li>
                <?= h($pim->activities_achievement) ?>
                </li>
               </ul>
              <p>Risks Mitigation</p>
              <ul class="ulmargin">
              <li>
              <?= h($pim->risks_mitigation) ?>
              </li>
              </ul>
              <p>Main Activity for Next Semester</p>
              <ul class="ulmargin">
              <li>
              <?= h($pim->risks_mitigation) ?>
              </li>
              </ul>
              <p>Total Expenditure</p>
              <ul class="ulmargin">
              <li>
              <?= $this->Number->format($pim->total_expenditure) ?>
              </li>
              </ul>

            </div><!--/.col-xs-6.col-lg-4-->
          </section>
          <section id="ProjectOversightStructure">

          <div class="col-xs-6 col-lg-12">
          <h2>Project Oversight Structure</h2>
              <p><u> Oversight Level</u></p>
              <ul class="ulmargin">
                <li>
                <?= h($pim->oversight_level) ?>
                </li>
               </ul>
              <p>Oversight Agency/MDA</p>
              <ul class="ulmargin">
              <li>
              <?= h($pim->oversight_agency_mda) ?>
              </li>
              </ul>
              <p>Main Activity for Next Semester</p>
              <ul class="ulmargin">
              <li>
              <?= h($pim->risks_mitigation) ?>
              </li>
              </ul>
              <p>Total Expenditure</p>
              <ul class="ulmargin">
              <li>
              <?= $this->Number->format($pim->total_expenditure) ?>
              </li>
              </ul>

            </div><!--/.col-xs-6.col-lg-4-->
          </section>


          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#ProjectComponent" class="list-group-item active">Link</a>
            <a href="#" class="list-group-item">Project Component</a>
            <a href="#ProjectOversightStructure" class="list-group-item">Project Oversight Structure </a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div> <!--/.container-->



        <div class="pims view card-body">
        <!-- <h3><?= h($pim->id) ?></h3> -->
        <?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i> Edit'), ['action' => 'edit', $pim->id], ['class' => 'btn btn-outline-dark btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>
        <table class="vertical-table">

        <table class="vertical-table">
            <thead>
                Revision Process Committe Members
            </thead>
            <tr>
                <th scope="row"><?= __('MDA') ?></th>
                <td><?= h($pim->mda) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Rresentative Information') ?></th>
                <td><?= h($pim->rev_commitee_rep_information) ?></td>
            </tr>
            <tr>
        </table>
        <table class="vertical-table">
            <thead>
                    Approvers
            </thead>
                <th scope="row"><?= __('Agency') ?></th>
                <td><?= h($pim->approvers_agency) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Representative Information') ?></th>
                <td><?= h($pim->approvers_rep_information) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Signed MOU') ?></th>
                <td><?= h($pim->signed_mou) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date') ?></th>
                <td><?= h($pim->approvers_date) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Adopted Minutes of Meeting') ?></th>
                <td><?= h($pim->adopted_minutes) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Financial Management Document') ?></th>
                <td><?= h($pim->financial_management) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Financial Template Document') ?></th>
                <td><?= h($pim->financial_template) ?></td>
            </tr>
        </table>
        <table class="vertical-table">
            <thead>
                    Work Plans
            </thead>
            <tr>
                <th scope="row"><?= __('Parties') ?></th>
                <td><?= h($pim->parties) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Responsibilities') ?></th>
                <td><?= h($pim->responsibilities) ?></td>
            <tr>
                <th scope="row"><?= __('Start Date') ?></th>
                <td><?= h($pim->start_date) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('End Date') ?></th>
                <td><?= h($pim->end_date) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Financial Cost') ?></th>
                <td><?= $this->Number->format($pim->financial_cost) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Targets') ?></th>
                <td><?= h($pim->targets) ?></td>
            </tr>
        </table>
        <table class="vertical-table">
            <thead>
                    Project Action Plans
            </thead>
            <tr>
                <th scope="row"><?= __('Activities') ?></th>
                <td><?= h($pim->activities) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Action') ?></th>
                <td><?= h($pim->action) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Responsible Party') ?></th>
                <td><?= h($pim->responsible_party) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Plan Start Date') ?></th>
                <td><?= h($pim->plan_start_date) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Plan End Date') ?></th>
                <td><?= h($pim->plan_end_date) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Dependency') ?></th>
                <td><?= h($pim->dependency) ?></td>
            </tr>
        </table>
        <table class="vertical-table">
            <thead>
                    Expenditure for Output based Disbursement
            </thead>
            <tr>
                <th scope="row"><?= __('Category') ?></th>
                <td><?= h($pim->category) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Owner') ?></th>
                <td><?= h($pim->owner) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Currency') ?></th>
                <td><?= h($pim->currency) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Disbursed Amount') ?></th>
                <td><?= $this->Number->format($pim->disbursed_amount) ?></td>
            </tr>
                <th scope="row"><?= __('Exp Output Date') ?></th>
                <td><?= h($pim->exp_output_date) ?></td>
            </tr>
        </table>
        <table class="vertical-table">
            <thead>
                    Milestone
            </thead>
            <tr>
                <th scope="row"><?= __('Task') ?></th>
                <td><?= h($pim->task) ?></td>
            </tr>
            </table>
        <table class="vertical-table">
            <thead>
                    Progress Report
            </thead>
            <tr>
                <th scope="row"><?= __('Category') ?></th>
                <td><?= h($pim->progress_category) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Currency') ?></th>
                <td><?= h($pim->progress_currency) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Amount of Credit Allocation') ?></th>
                <td><?= $this->Number->format($pim->amount_credit_allocation) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Disbursed in Current Semester') ?></th>
                <td><?= h($pim->disbursed_current_semester) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date Disbursement') ?></th>
                <td><?= h($pim->date_disbursement) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cumulated Disbursment') ?></th>
                <td><?= h($pim->cumulated_disbursment) ?></td>
            </tr>
        </table>
        </div>
    </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>

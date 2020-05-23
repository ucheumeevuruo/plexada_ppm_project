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
        .bat {
    display: none;
    }

    .tab {
    display: none;
    }

    #ssubmit {
    display: none;
    }

    .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
    opacity: 1;
    }
</style>

<div class="container-fluid">
    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'index'])?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">PIM</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->
    <?= $this->Form->create($pim) ?>
    <fieldset>
    <!-- <div class="text-center mb-3">a</div> -->
        <legend class="text-center text-primary mb-4"><?= __('Project Implementation Manual')  ?></legend>
        <h2 class="text-center text-success mb-4"><?= __("Project Name : $project_info->name")  ?></h2>
        <input type="hidden"id="project_id" name="project_id" required="required" value="<?= $project_info->id; ?>">
        <!-- <input type="text"id="project_id" name="project_id" required="required" value="<?= $project_info->introduction; ?>"> -->
        <!-- my code  -->
    <!-- 0th Row  -->
    <div class="row justify-content-around">
            <div class="col-md-5 col-sm-12 card bat">
                <legend class="text-primary">Main</legend>
                <div class="form-group text">
                    <label class="control-label" for="datepicker0">Date</label>
                    <div class="input-group"><input type="text" name="date" class="form-control addon-right" empty="1" id="date" autocomplete="off">
                    <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Brief">Brief</label>
                    <textarea class="form-control" id="Brief" required="required" name="brief" value="<?= $project_info->introduction; ?>"></textarea>
                </div>

                <legend class="text-primary">Project Oversight Structure</legend>
                <div class="form-group">
                    <label for="oversight_level">Oversight Level</label>
                    <input type="text" class="form-control" id="oversight_level" name="oversight_level" required="required">
                </div>
                <div class="form-group">
                    <label for="oversight_agency_mda">Oversight Agency / MDA</label>
                    <input type="text" class="form-control" id="oversight_agency_mda" name="oversight_agency_mda" required="required">
                </div>
            </div>

            <div class="col-md-5 col-sm-12 card tab">
            <legend class="text-primary">Project Components</legend>
                <div class="mb-3">
                    <?= $this->Html->link(__('Add Components'), ['controller' => 'projectComponents', 'action' => 'add',$project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?>
                    <?= $this->Html->link(__('Add Indicator'), ['controller' => 'Milestones', 'action' => 'add',$project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?>
                    <?= $this->Html->link(__('Add Activities'), ['controller' => 'Activities', 'action' => 'add',$project_info->id], ['class' => 'btn btn-primary btn-sm mr-2 overlay']) ?>
                    <?= $this->Html->link(__('Add Tasks'), ['controller' => 'Tasks', 'action' => 'add',$project_info->id], ['class' => 'btn btn-primary btn-sm overlay']) ?>
                </div>
                <div class="form-group">
                    <label for="activity_next_semester">Main Activities for Next Semester</label>
                    <textarea class="form-control" id="activity_next_semester" name ="activity_next_semester" required="required"></textarea>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Total Expenditure</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="number" id="total_expenditure" name="total_expenditure" class="form-control" required="required" aria-label="Amount (to the nearest naira)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                    </div>
                </div>
             </div>
    </div>
<!-- Oth Row End -->
    <!-- 1st Row  -->
    <div class="row justify-content-around">
            <div class="col-md-5 col-sm-12 card tab">

            <legend class="text-primary">Aprrovals</legend>
                <div id="inputApproval">
                    <div class="form-group">
                        <label for="approvers_agency">Agency</label>
                        <input type="text" class="form-control" id="approvers_agency" name="approvers_agency" required="required">
                    </div>
                    <div class="form-group">
                        <label for="approvers_rep_information">Representative Information</label>
                        <textarea class="form-control" id="approvers_rep_information" name="approvers_rep_information" required="required"></textarea>
                    </div>
                    <div class="form-group text">
                        <label class="control-label" for="approvers_date">Date</label>
                        <div class="input-group"><input type="text" name="approvers_date" class="form-control addon-right" empty="1" id="approvers_date" autocomplete="off">
                        <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                        </div>
                    </div>
                </div>
                <div id="newApproval"></div>
                <button id="addApproval" type="button" class="btn btn-primary mb-5">Add New Approval</button>
                <div class="form-group">
                    <label for="signed_mou">SIGNED MOU (PIM)</label>
                    <input type="file" class="form-control" id="signed_mou" name="signed_mou" required="required">
                </div>
                <div class="form-group">
                    <label for="signed_mou">ADOPTED MINUTES OF MEETING</label>
                    <input type="file" class="form-control" id="adopted_minutes" name="adopted_minutes" required="required">
                </div>
                <div class="form-group">
                    <label for="signed_mou">FINANCIAL MANAGEMENT DOCUMENT</label>
                    <input type="file" class="form-control" id="financial_management" name="financial_management" required="required">
                </div>
                <div class="form-group">
                    <label for="signed_mou">FINANCIAL TEMPLATE DOCUMENT</label>
                    <input type="file" class="form-control" id="financial_template" name="financial_template" required="required">
                </div>
            </div>
            <div class="col-md-5 col-sm-12 card bat">
            <legend class="text-primary">Revision Process Committe Members</legend>
                    <div class="form-group">
                            <label for="mda">MDA</label>
                            <input type="text" class="form-control" id="mda" name="mda" required="required">
                    </div>
                    <div class="form-group">
                        <label for="rev_commitee_rep_information">Representative Information</label>
                        <input type="text" class="form-control" id="rev_commitee_rep_information" name="rev_commitee_rep_information" required="required">
                    </div>

                <legend class="text-primary">Work Plans</legend>
                <div class="form-group">
                    <label for="parties">Parties</label>
                    <input type="text" class="form-control" id="parties" name="parties" required="required">
                </div>
                <div class="form-group">
                    <label for="responsibilities">Responsibilities</label>
                    <textarea class="form-control" id="responsibilities" name="responsibilities" required="required"></textarea>
                </div>
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                        <label class="control-label" for="start_date">Start Date</label>
                            <div class="input-group"><input type="text" name="start_date" class="form-control addon-right" empty="1" id="start_date" autocomplete="off">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                        <label class="control-label" for="end_date">End Date</label>
                            <div class="input-group"><input type="text" name="end_date" class="form-control addon-right" empty="1" id="end_date" autocomplete="off">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="FinancialCost">Financial Cost</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="number" id="financial_cost" name = "financial_cost" required = "required" class="form-control" aria-label="Amount (to the nearest naira)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="targets">Targets</label>
                    <input type="text" class="form-control" id="targets" name = "targets" required = "required">
                </div>
            </div>
    </div>
<!-- 1st Row End -->
<!-- Second row  -->
    <div class="row justify-content-around">
            <div class="col-md-5 col-sm-12 card bat">
                <legend class="text-primary">Project Action Plan</legend>
                    <div class="form-group">
                            <label for="activities">Activities</label>
                            <textarea class="form-control" id="activities" name="activities" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Owner">Action</label>
                        <input type="text" class="form-control" id="action" name = "action" required = "required">
                    </div>
                <div class="form-group">
                    <label for="Agency">Responsible Party</label>
                    <input type="text" class="form-control" id="responsible_party" name = "responsible_party" required = "required">
                </div>
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                        <label class="control-label" for="plan_start_date">Start Date</label>
                            <div class="input-group"><input type="text" name="plan_start_date" class="form-control addon-right" empty="1" id="plan_start_date" autocomplete="off">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label class="control-label" for="plan_end_date">End Date</label>
                            <div class="input-group"><input type="text" name="plan_end_date" class="form-control addon-right" empty="1" id="plan_end_date" autocomplete="off">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="dependency">Dependency</label>
                        <textarea class="form-control" id="dependency" name="dependency" required="required"></textarea>
                    </div>
            </div>
            <div class="col-md-5 col-sm-12 card tab">
                <legend class="text-primary">Expenditure for output based disbursement</legend>
                        <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" name = "category" required="required">
                        </div>
                        <div class="form-group">
                            <label for="owner">Owner</label>
                            <input type="text" class="form-control" id="owner" name = "owner" required="required">
                        </div>


                    <label for="currencies">Currency</label>
                    <select id="currencies" name="currency" class="mb-3">
                        <option value="naira">NGN</option>
                        <option value="dollar">USD</option>
                        <option value="euro">EU</option>
                        <option value="pound">GBP</option>
                    </select>

                    <div class="form-group">
                        <label for="disbursed_amount">Disbursed Amount</label>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input id="disbursed_amount" name="disbursed_amount" type="number" required="required" class="form-control" aria-label="Amount (to the nearest naira)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group text">
                        <label class="control-label" for="exp_output_date">Date</label>
                        <div class="input-group"><input type="text" name="exp_output_date" class="form-control addon-right" empty="1" id="exp_output_date" autocomplete="off">
                        <span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="row">
        <div class="col p-3">
            <div>
                <div class=" row text-center justify-content-center">
                    <div class="col-md-2"><button class="btn btn-primary form-control" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button></div>
                    <div class="col-md-2"><button class="btn btn-primary form-control" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button></div>
                </div>
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </div>
        </div>
    </div>
    </fieldset>
    <div class="row justify-content-center mb-5">
        <div class="col-md-5">
            <?= $this->Form->button(__('Submit'),['id' => 'ssubmit','class'=>'form-control']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>

<!-- MODAL ELEMENTS -->

<div id="dialogModal" class="bg-primary">
    <!-- the external content is loaded inside this tag -->
    <div id="contentWrap">
        <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-md']) ?>
        <?= $this->Modal->body()// No header ?>
        <?= $this->Modal->footer()// Footer with close button (default) ?>
        <?= $this->Modal->end() ?>
    </div>
    <div id="uploadContent">
        <?= $this->Modal->create(['id' => 'upload', 'size' => 'modal-sm']) ?>
        <?= $this->Modal->body('
            <form>
                <div class="form-group">
                <label for="exampleFormControlFile1">Import file</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </form>
        ')// No header ?>
        <?= $this->Modal->footer()// Footer with close button (default) ?>
        <?= $this->Modal->end() ?>
    </div>
</div>




<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("bat");
    var y = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    y[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        // document.getElementById("nextBtn").innerHTML = "Submit";
        // document.getElementById("nextBtn").type = "submit";
        document.getElementById("nextBtn").style.display = "none";
        document.getElementById("ssubmit").style.display = "block";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
        document.getElementById("nextBtn").style.display = "block";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
    }

    function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("bat");
    var y = document.getElementsByClassName("tab");
    console.log(n)
    // Exit the function if any field in the current tab is invalid:
    //   if (n == 1 && !validateForm()) return false;
    if (n == 1);
    console.log(n)
    // Hide the current tab:
    x[currentTab].style.display = "none";
    y[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        // document.getElementById("regForm").submit();
        // return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
    }


    function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
    }

    $("#addApproval").click(function () {
            var html = '';
            html += '<div id="inputApproval">';
            html += '<div class="form-group">';
            html += '<label for="approvers_agency">Agency</label>';
            html += '<input type="text" class="form-control" id="approvers_agency" name="approvers_agency" required="required">';
            html += '</div>';
            html += '<div class="form-group">';
            html += '<label for="approvers_rep_information">Representative Information</label>';
            html += '<textarea class="form-control" id="approvers_rep_information" name="approvers_rep_information" required="required"></textarea>';
            html += '</div>';
            html += '<div class="form-group text">';
            html += '<label class="control-label" for="approvers_date">Date</label>';
            html += '<div class="input-group"><input type="text" name="approvers_date" class="form-control addon-right" empty="1" id="approvers_date" autocomplete="off">';
            html += '<span class="input-group-addon"><i class="fa fa-calendar fa-lg btn btn-outline-dark btn-md addon-right border-0"></i></span>';
            html += '</div>';
            html += '</div>';
            html += '<button id="removeApproval" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newApproval').append(html);
        });

        // remove row
        $(document).on('click', '#removeApproval', function () {
            $(this).closest('#inputApproval').remove();
        });

    $(function () {
        $('#date, #approvers_date, #start_date, #end_date, #plan_start_date, #plan_end_date, #start_date, #exp_output_date, #date_disbursement').datepicker({
            inline: true,
            "format": "dd/mm/yyyy",
            "keyboardNavigation": false
        });
    });

    $(document).ready(function() {
            //respond to click event on anything with 'overlay' class
            $(".overlay").click(function(event){
                event.preventDefault();
                //load content from href of link
                $('#contentWrap .modal-body').load($(this).attr("href"), function(){
                    $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content').removeClass()
                    $('#MyModal4').modal('show')
                });
            });

            $(".upload").click(function (event) {
                event.preventDefault();
                $("#upload").modal('show')
            })
            $('.dataTable').DataTable();
        });

</script>

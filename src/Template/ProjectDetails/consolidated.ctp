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

<div class="container-fluid" id="main">
    <div class="card shadow mb-4 " style="padding: 20px 20px 0 20px">
        <div class="me-dropdowns input-group mb-4" style="display: flex; justify-content:space-between;">
            <div>

                <div style=" display: flex; flex-direction:row; justify-content:space-around; outline: 5px solid #4E73DF; padding-left: 22px"
                    class="input-group">
                    <div class="dropdown mr-auto">
                        <div class="bootstrap-iso">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-12">

                                        <!-- Form code begins -->
                                        <?= $this->Form->create() ?>
                                            <div class="form-group">
                                                <!-- Date input -->
                                                <label class="control-label" for="date">From</label>
                                                <input class="form-control" id="date" name="from"
                                                    placeholder="MM/DD/YYY" type="text"
                                                    style="background-color: #CDD8F6; border-color: #4E73DF; border-width: medium;" />
                                            </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown mr-auto" style="width: 200px;">
                        <div>

                        </div>
                        <div class="bootstrap-iso">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-12">

                                            <div class="form-group">
                                                <!-- Date input -->
                                                <label class="control-label" for="date">To</label>
                                                <input class="form-control" id="dateto" name="dateto"
                                                    placeholder="MM/DD/YYY" type="text"
                                                    style="background-color: #CDD8F6; border-color: #4E73DF; border-width: medium;" />
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>

            </div>
        </div>
        <div class="row">
            <div class = "col-md-6">
            <?= $this->Form->button(__('Display'), ["class" => "btn-primary ", 'label'=> 'Display']) ?>
            <button type="button" class="btn btn-info ml-4" id="exp" onclick = "exportTableToExcel('table2excel',filename ='consolidated rpt');">Export to Excel</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
        <hr>
        <div>
        </div>
        <?php if(isset($projectReports)){ ?>
            <h3 colspan=10>OGUN STATE CONSOLIDATED PORTFOLIO REPORT FROM <?php echo $fromshdate1 ?></h3>
        <?php } else { ?>
        <h3 colspan=10>OGUN STATE CONSOLIDATED PORTFOLIO REPORT FROM ....</h3>
        <?php }  ?>
        <div class="table-responsive justify-content-center">
            <table cellpadding="0" id ="table2excel" cellspacing="0" class="table table-bordered table-sm dataTable table-info table-hover br-m justify-content-center"
                role="grid" aria-describedby="dataTable_info">                
                <thead class="bg-success">
                    <tr>
                        <th scope="col" class="text-white"><?= __('S/N  ') ?></th>
                        <th scope="col" class="text-white"><?= __('Projects') ?></th>
                        <th scope="col" class="text-white"><?= __('State Sector Development Plan') ?></th>
                        <th scope="col" class="text-white"><?= __('State Allocation(Notional Amount from WB)($m)') ?></th>
                        <th scope="col" class="text-white"><?= __('Monthly Disbursement by Project') ?></th>
                        <th scope="col" class="text-white"><?= __('Cummulative Amount Disbursed From Project start till date') ?></th>
                        <th scope="col" class="text-white"><?= __('Undisbursed Balance') ?></th>
                        <th scope="col" class="text-white"><?= __('% Disbursed') ?></th>
                        <?php if(isset($projectReports)){ ?>
                        <th scope="col" class="text-white"><?= __("Amount Disbursed from {$fromshdate1}") ?></th>
                        <?php }else { ?>
                            <th scope="col" class="text-white"><?= __("Amount Disbursed from ..") ?></th>
                        <?php } ?>
                        <?php if(isset($projectReports)){ ?>
                        <th scope="col" class="text-white"><?= __("Disbursement Protection {$fromshdate2} ") ?></th>
                        <?php }else { ?>
                            <th scope="col" class="text-white"><?= __("Disbursement Protection..") ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($projectReports)){ ?>
                    <?php $num = 0; ?>
                    <?php foreach ($projectReports as $projectDetail) : ?>
                    <?php
                    $onethird = ($projectDetail->cost) * 0.33;
                    $leftbalance = ($projectDetail->cost) - $onethird;
                    $percent = ($onethird/($projectDetail->cost) ) * 100;
                    $fromto = $onethird/2;
                    $leftto = ($projectDetail->cost)/3
                    ?>
                    <?php $num++; ?>
                    <tr>
                    <td style="width:5%" style="color: black !important;" class="mx-auto"><?= h($num) ?></td>
                    <td style="width:5%" style="color: black !important;" class="mx-auto"><?= $projectDetail->name ?></td>
                    <td style="width:5%" style="color: black !important;" class="mx-auto"><?= $projectDetail->location ?></td>
                    <td style="width:5%" style="color: black !important;" class="mx-auto"><?= $this->Number->currency(($projectDetail->cost)/1000000) ?></td>
                    <td style="width:5%" style="color: black !important;" class="mx-auto"><?= $this->Number->currency(($projectDetail->cost)/12000000) ?></td>
                    <td style="width:5%" style="color: black !important;" class="mx-auto"><?= $this->Number->currency($onethird/1000000) ?></td>
                    <td style="width:5%" style="color: black !important;" class="mx-auto"><?= $this->Number->currency($leftbalance/1000000) ?></td>
                    <td style="width:5%" style="color: black !important;" class="mx-auto"> <?= $percent?></td>
                    <td style="width:5%" style="color: black !important;" class="justify-content-center"><?= $this->Number->currency($fromto/1000000)?></td>
                    <td style="width:5%" style="color: black !important;" class="mx-auto"><?= $this->Number->currency(($leftto)/1000000) ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php } ?>
                <tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(function () {
        $('#date, #dateto').datepicker({
            inline: true,
            "format": "yyyy/mm/dd",
            // startDate: "0d",
            // "endDate": "09-15-2017",
            "keyboardNavigation": false
        });
    });

    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>


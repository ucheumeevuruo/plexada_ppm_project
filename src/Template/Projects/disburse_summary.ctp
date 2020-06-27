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

?>

<div class="container-fluid mt-4">
    <!-- Breadcrumb area -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <?= $this->Html->link(__('Projects'), ['action' => 'disbursement']) ?>
            </li>
            <li class="breadcrumb-item active" aria-current="page">disbursements</li>
        </ol>
    </nav>
    <!-- ./end Breadcrumb -->

    <!-- Navigation area -->
    <ul class="nav nav-tabs">

        <li class="nav-item">
            <?= $this->Html->link('Indicators', ['action' => 'indicators', $project->id], ['id' => 'transmit', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link('Disbursements', ['action' => 'disburseSummary', $project->id], ['id' => 'transmit', 'class' => 'nav-link active']) ?>
        </li>

    </ul>
    <!-- ./end Navigation area -->

    <!-- Menu area [Search, pagination] -->
    <!-- I was supposed to put this section in the element template but will do that soon. -->
    <nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
        <a class="navbar-brand" href="#">Disbursed Summary</a>
        <div class="mr-auto mt-2 mt-lg-0">
            <?= $this->Html->link(__('Add'), ['controller' => 'disburses', 'action' => 'add', $project->id], ['class' => 'btn btn-info rounded-2 overlay', 'title' => 'Add', 'escape' => false]) ?>
        </div>

    </nav>
    <!-- .\end Menu Area -->
    <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?> </h2>


    <div class="grey-bg py-4">
        <div class="row mx-0 mb-0">
            <table class="table table-border table-responsive-lg font-weight-bolder thead-dark">
                <thead class="thead-dark">
                    <tr>
                        <td>S/N</td>
                        <td>Source of fund</td>
                        <td>Discription (Comments)</td>
                        <td>Amount</td>
                        <td>Date disbursed</td>
                        <td>Uploaded by</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody class="mb-0">
                    <?php $num = 1; ?>
                    <?php foreach ($project->disburses as $disburse) : ?>
                        <tr>
                            <td><?= h($num++) ?></td>
                            <td>
                                <?php foreach ($sponsors as $sponsor) : ?>
                                    <?php if ($sponsor->id == $disburse->source_of_funding) : ?>
                                        <?= h($sponsor->first_name . '  ' . $sponsor->last_name) ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td><?= h($disburse->description) ?></td>
                            <td><?= $this->NumberFormat->format($disburse->amount, ['before' => $project->project_detail->currency->symbol]) ?></td>
                            <td><?= h($disburse->date->format('d/m/Y')) ?></td>
                            <td><?= h($project->project_detail->user->username) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fas fa-pencil-alt fa-sm"></i>'), ['controller' => 'disburses', 'action' => 'edit', $disburse->id], ['class' => 'btn btn-outline-warning btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>
                                <?= $this->Form->postLink(__("<i class='fas fa-trash fa-sm'></i>"), ['controller' => 'disburses', 'action' => 'delete', $disburse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disburse->name), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="mb-0 mx-0">
                        <td colspan="6">
                            <hr>
                        </td>
                    </tr>
                    <tr class="mb-0">
                        <td></td>
                        <td></td>
                        <td>Total </td>
                        <td><?= $this->NumberFormat->format($total, ['before' => $project->project_detail->currency->symbol]) ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="py-0" id="sub-applet">

    </div>
    <!-- MODAL ELEMENTS -->

    <div id="dialogModal" class="bg-primary">
        <!-- the external content is loaded inside this tag -->
        <div id="contentWrap">
            <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-lg']) ?>
            <?= $this->Modal->body() // No header
            ?>
            <?= $this->Modal->footer() // Footer with close button (default)
            ?>
            <?= $this->Modal->end() ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            //respond to click event on anything with 'overlay' class
            $(".overlay").click(function(event) {
                event.preventDefault();
                //load content from href of link
                $('#contentWrap .modal-body').load($(this).attr("href"), function() {
                    $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content')
                        .removeClass()
                    $('#MyModal4').modal('show')
                });
            });
        });
        $(document).on('click', '#clickable-sub-applet', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            console.log(href)
            $.ajax({
                url: href,

                // contentType: "application/json",
                // dataType: 'json',
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(result) {
                    $('#sub-applet').html(result);
                    // history.pushState(null, null, href);
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {

                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        })
    </script>
</div>
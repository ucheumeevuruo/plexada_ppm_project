<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponsor[]|\Cake\Collection\CollectionInterface $sponsors
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= __('Sponsors') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay', 'title' => 'Add', 'escape' => false]) ?>

                </div></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable" role="grid" aria-describedby="dataTable_info">

                    <thead>
                    <tr>
                        <th scope="col"><?= __('last_name') ?></th>
                        <th scope="col"><?= __('first_name') ?></th>
                        <th scope="col"><?= __('other_names') ?></th>
                        <th scope="col"><?= __('role') ?></th>
                        <th scope="col"><?= __('address') ?></th>
                        <th scope="col"><?= __('state') ?></th>
                        <th scope="col"><?= __('country') ?></th>
                        <th scope="col"><?= __('email') ?></th>
                        <th scope="col"><?= __('phone_no') ?></th>
                        <th scope="col"><?= __('created') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sponsors as $sponsor): ?>
                        <tr>
                            <td><?= h($sponsor->last_name) ?></td>
                            <td><?= h($sponsor->first_name) ?></td>
                            <td><?= h($sponsor->other_names) ?></td>
                            <td><?= h($sponsor->role) ?></td>
                            <td><?= h($sponsor->address) ?></td>
                            <td><?= h($sponsor->state) ?></td>
                            <td><?= h($sponsor->country) ?></td>
                            <td><?= h($sponsor->email) ?></td>
                            <td><?= h($sponsor->phone_no) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fa fa-pencil fa-lg"></i>'), ['action' => 'edit', $sponsor->id], ['class' => 'btn btn-outline-warning btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>

                                <?= $this->Form->postLink(__("<i class='fa fa-trash-o fa-lg'></i>"), ['action' => 'delete', $sponsor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsor->id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- overlayed element -->
<div id="dialogModal">
    <!-- the external content is loaded inside this tag -->
    <div id="contentWrap">
        <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-lg']) ?>
        <?= $this->Modal->body()// No header ?>
        <?= $this->Modal->footer()// Footer with close button (default) ?>
        <?= $this->Modal->end() ?>
    </div>
</div>
<script>
    $(".overlay").click(function(event){
        event.preventDefault();
        //load content from href of link
        $('#contentWrap .modal-body').load($(this).attr("href"), function(){
            $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content').removeClass()
            $('#MyModal4').modal('show')
        });
    });
    $(document).ready(function() {
        $('.dataTable').DataTable();
    } );
</script>

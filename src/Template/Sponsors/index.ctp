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

<h2 class="text-center text-primary pb-2 font-weight-bold"><?= __('Sponsors') ?></h2>

    <div class="br-m shadow mb-4">
        <div class="br-t py-3 bg-primary">
            <h3 class="m-0 text-white pl-3"><?= __('Add') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>

                </div></h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable table-primary table hover" role="grid" aria-describedby="dataTable_info">

                    <thead class="bg-primary">
                    <tr>
                        <th scope="col" class="text-white"><?= __('Last_name') ?></th>
                        <th scope="col" class="text-white"><?= __('First name') ?></th>
                        <th scope="col" class="text-white"><?= __('Other names') ?></th>
                        <th scope="col" class="text-white"><?= __('Sponor Type') ?></th>
                        <th scope="col" class="text-white"><?= __('Role') ?></th>
                        <th scope="col" class="text-white"><?= __('Address') ?></th>
                        <th scope="col" class="text-white"><?= __('State') ?></th>
                        <th scope="col" class="text-white"><?= __('Country') ?></th>
                        <th scope="col" class="text-white"><?= __('Email') ?></th>
                        <th scope="col" class="text-white"><?= __('Phone no') ?></th>
                        <th scope="col" class="text-white"><?= __('Created') ?></th>
                        <th scope="col" class="text-white" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sponsors as $sponsor): ?>
                        <tr>
                            <td><?= h($sponsor->last_name) ?></td>
                            <td><?= h($sponsor->first_name) ?></td>
                            <td><?= h($sponsor->other_names) ?></td>
                            <td><?= $sponsor->has('sponsor_type') ? h($sponsor->sponsor_type->lov_value) : '' ?></td>
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

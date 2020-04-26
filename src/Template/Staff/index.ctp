<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff[]|\Cake\Collection\CollectionInterface $staff
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="container-fluid">
<h2 class="text-center text-primary pb-2 font-weight-bold"><?= __('Personnel') ?></h2>

    <div class="shadow mb-4">
        <div class="py-3 bg-primary br-t">
            <h3 class="m-0 pl-3 text-white"><?= __('Add') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>

                </div>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable br-m" role="grid" aria-describedby="dataTable_info">

                    <thead class="bg-primary">
                        <tr class="">
                            <th scope="col" class="text-white"><?= __('Last Name') ?></th>
                            <th scope="col" class="text-white"><?= __('First Name') ?></th>
                            <th scope="col" class="text-white"><?= __('Other Names') ?></th>
                            <th scope="col" class="text-white"><?= __('Role') ?></th>
                            <th scope="col" class="text-white"><?= __('Address') ?></th>
                            <th scope="col" class="text-white"><?= __('State') ?></th>
                            <th scope="col" class="text-white"><?= __('Country') ?></th>
                            <th scope="col" class="text-white"><?= __('Email') ?></th>
                            <th scope="col" class="text-white"><?= __('Phone Number') ?></th>
                            <th scope="col" class="text-white" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($staff as $staff): ?>
                        <tr>
                            <td><?= h($staff->last_name) ?></td>
                            <td><?= h($staff->first_name) ?></td>
                            <td><?= h($staff->other_names) ?></td>
                            <td><?= $staff->has('role') ? h($staff->role->name) : '' ?></td>
                            <td><?= h($staff->address) ?></td>
                            <td><?= h($staff->state) ?></td>
                            <td><?= h($staff->country) ?></td>
                            <td><?= h($staff->email) ?></td>
                            <td><?= h($staff->phone_no) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fa fa-pencil fa-lg text-primary"></i>'), ['action' => 'edit', $staff->id], ['class' => 'btn btn-outline-warning btn-sm overlay text-primary', 'title' => 'Edit', 'escape' => false]) ?>

                                <?= $this->Form->postLink(__("<i class='fa fa-trash-o fa-lg'></i>"), ['action' => 'delete', $staff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm text-primary']) ?>
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

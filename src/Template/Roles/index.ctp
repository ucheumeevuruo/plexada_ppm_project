<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="container-fluid">

<h2 class="text-center text-primary pb-2 font-weight-bold"><?= __('Roles') ?></h2>

    <div class="shadow mb-4 br-m">
        <div class="py-3 bg-primary br-t">

            <h3 class="m-0 text-white pl-3"><?= __('Add') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>

                </div>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable table-primary table-hover br-m" role="grid" aria-describedby="dataTable_info">

                    <thead class="bg-primary">
                    <tr>
                        <th scope="col" class="text-white"><?= __('name') ?></th>
                        <th scope="col" class="text-white"><?= __('created') ?></th>
                        <th scope="col" class="text-white"><?= __('modified') ?></th>
                        <th scope="col" class="text-white" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($roles as $role): ?>
                        <tr>
                            <td><?= h($role->name) ?></td>
                            <td><?= h($role->created) ?></td>
                            <td><?= h($role->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fa fa-pencil fa-lg"></i>'), ['action' => 'edit', $role->id], ['class' => 'btn btn-outline-warning btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>

                                <?= $this->Form->postLink(__("<i class='fa fa-trash-o fa-lg'></i>"), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
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

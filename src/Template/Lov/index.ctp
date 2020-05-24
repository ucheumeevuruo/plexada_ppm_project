<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lov[]|\Cake\Collection\CollectionInterface $lov
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<div class="lov container">
    <h3><?= __('List of Values') ?></h3>
    <div class="py-3 pl-3 bg-primary br-t">
            <h3 class="m-0 text-white"><?= __('Add List of values') ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>
                </div>
            </h3>
        </div>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable table-hover table-primary br-m">
        <thead class="bg-primary">
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lov_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lov_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('system_user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lov as $lov): ?>
            <tr>
                <td><?= $this->Number->format($lov->id) ?></td>
                <td><?= h($lov->lov_type) ?></td>
                <td><?= h($lov->lov_value) ?></td>
                <td><?= h($lov->created) ?></td>
                <td><?= h($lov->last_updated) ?></td>
                <td><?= h($lov->system_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lov->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lov->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lov->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lov->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
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

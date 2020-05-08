<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity[]|\Cake\Collection\CollectionInterface $activities
 */
?>
<div class="activities container-fluid">
    <h3><?= __('Activities') ?></h3>
    <p>
        <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i> Add'),
            ['action' => 'add', $project_id, $activity_type],
            ['class' => 'btn btn-outline-primary btn-sm overlay float-left', 'title' => 'Edit', 'escape' => false]) ?>
    </p>
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('assigned_to_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('currency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activities as $activity) : ?>
            <tr>
                <td><?= $activity->has('staff') ? $this->Html->link($activity->staff->full_name, ['controller' => 'Staff', 'action' => 'view', $activity->staff->id]) : '' ?></td>
                <td><?= $activity->has('priority') ? $this->Html->link($activity->priority->lov_value, ['controller' => 'Lov', 'action' => 'view', $activity->priority->id]) : '' ?></td>
                <td><?= $activity->start_date ?></td>
                <td><?= $activity->end_date ?></td>
                <td><?= $activity->has('currency') ? $activity->currency->symbol : '' ?></td>
                <td><?= $activity->cost ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Add Activity'), ['action' => 'add', $activity->activity_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->activity_id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->activity_id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
        </p>
    </div>
</div>


<div id="dialogModal" class="bg-primary">
    <!-- the external content is loaded inside this tag -->
    <div id="contentWrap">
        <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-lg']) ?>
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
    });

    $(function() {
        $('#waiting_since, #start_date, #end_date').datepicker({
            inline: true,
            "format": "dd/mm/yyyy",
            startDate: "0d",
            // "endDate": "09-15-2017",
            "keyboardNavigation": false
        });
    });

    $('.dataTable').DataTable();

</script>
</div>
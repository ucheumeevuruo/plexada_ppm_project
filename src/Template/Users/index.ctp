     <?php

    /**
     * @var \App\View\AppView $this
     * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
     */
    $this->start('sidebar');
    echo $this->element('sidebar/default');
    $this->end();
    $this->start('navbar');
    echo $this->element('navbar/default');
    $this->end();
    ?>
 <div class="users container mt-4">
     <!-- Breadcrumb area -->
     <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
             <li class="breadcrumb-item">
                 <?= $this->Html->link(__('Projects'), ['action' => 'index']) ?>
             </li>
             <li class="breadcrumb-item active" aria-current="page">Users</li>
         </ol>
     </nav>
     <!-- ./end Breadcrumb -->

     <div class="py-3 pl-3 bg-primary br-t">
         <h3 class="m-0 text-white"><?= __('All Users') ?>
             <div class="btn-group" role="group" aria-label="Basic example">
                 <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay ml-2', 'title' => 'Add', 'escape' => false]) ?>
             </div>
         </h3>
     </div>
     <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable table-hover table-primary br-m">
         <thead class="bg-light text-primary">
             <tr >
                 <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                 <!-- <th scope="col"><?= $this->Paginator->sort('password') ?></th> -->
                 <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                 <th scope="col" class="actions"><?= __('Actions') ?></th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($users as $user) : ?>
                 <tr>
                     <td><?= $this->Number->format($user->id) ?></td>
                     <td><?= h($user->username) ?></td>
                     <!-- <td><?= h($user->password) ?></td> -->
                     <td><?= h($user->email) ?></td>
                     <td><?= $user->has('lov') ? $this->Html->link($user->lov->lov_value, ['controller' => 'Lov', 'action' => 'view', $user->lov->id]) : '' ?></td>
                     <td><?= h($user->name) ?></td>
                     <td><?= h($user->created) ?></td>
                     <td><?= h($user->modified) ?></td>
                     <td class="actions">
                         <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?> -->
                         <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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


 <!-- overlayed element -->
 <div id="dialogModal" class="bg-primary">
     <!-- the external content is loaded inside this tag -->
     <div id="contentWrap">
         <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-md']) ?>
         <?= $this->Modal->body()// No header 
            ?>
         <?= $this->Modal->footer()// Footer with close button (default) 
            ?>
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
            ')// No header 
            ?>
         <?= $this->Modal->footer()// Footer with close button (default) 
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
                 $('.projectDetails .large-9, .projectDetails .medium-8, .projectDetails .columns, .projectDetails .content').removeClass()
                 $('#MyModal4').modal('show')
             });
         });

         $(".upload").click(function(event) {
             event.preventDefault();
             $("#upload").modal('show')
         })
         $('.dataTable').DataTable();
     });
 </script>
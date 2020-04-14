<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message[]|\Cake\Collection\CollectionInterface $messages
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?></li>
        <?= $this->Html->link(__('<i class="fa fa-plus fa-lg"></i>'), ['action' => 'add'], ['class' => 'btn btn-light overlay border-right', 'title' => 'Add', 'escape' => false]) ?>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-5">
                <div class="messages">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between bg-primary">
                        <h3 class="m-0 text-white"><?= __('Messages') ?></h3>
                    </div>
                        <div class="row p-4">
                            <div class="col-3">
                                <div class="col mb-4">
                                <?= $this->Html->link(__('Compose'), ['action' => 'add'], ['class' => 'btn btn-secondary overlay border-right form-control', 'title' => 'Compose', 'escape' => false]) ?>
                                </div>
        
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Inbox</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Outbox</a>
                                    <!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Draft</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> -->
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <table cellpadding="0" cellspacing="0" class="table-hover w-100">
                                        <thead>
                                            <tr>
                                                <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                                                <th scope="col"><?= $this->Paginator->sort('sender_id') ?></th>
                                                <!-- <th scope="col"><?= $this->Paginator->sort('recipient_id') ?></th> -->
                                                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Message') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
                                                <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                                                <th scope="col" class="actions"><?= __('Delete') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($inboxmessages as $message): ?>
                                            <tr>
                                                <!-- <td><?= $this->Number->format($message->id) ?></td> -->
                                                <!-- <td><?= $this->Number->format($message->sender_id) ?></td> -->
                                                <td><?= $message->has('user') ? $message->user->username : '' ?></td>
                                                <td><?= $this->Html->link($this->text->truncate($message->subject,15), ['action' => 'view', $message->id],['class'=>'overlay']) ?></td>
                                                <td><?= $this->text->truncate(h($message->body),20) ?></td>
                                                <td><?= h($message->created->format('d-M-Y H:i')) ?></td>
                                                <!-- <td><?= h($message->modified) ?></td> -->
                                                <td class="actions">
                                                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $message->id]) ?>
                                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $message->id]) ?> -->
                                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o fa-lg"></i>'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id),'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <!-- start changing divs  -->
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <table cellpadding="0" cellspacing="0" class="table-hover w-100">
                                        <thead>
                                            <tr>
                                                <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                                                <!-- <th scope="col"><?= $this->Paginator->sort('sender_id') ?></th> -->
                                                <th scope="col"><?= $this->Paginator->sort('recipient_id') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Message') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
                                                <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                                                <th scope="col" class="actions"><?= __('Delete') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($messages as $message): ?>
                                            <tr>
                                                <!-- <td><?= $this->Number->format($message->id) ?></td> -->
                                                <!-- <td><?= $this->Number->format($message->sender_id) ?></td> -->
                                                <td><?= $message->has('user') ? $message->user->username : '' ?></td>
                                                <td><?= $this->Html->link($this->text->truncate($message->subject,15), ['action' => 'view', $message->id],['class'=>'overlay']) ?></td>
                                                <td><?= $this->text->truncate(h($message->body),20) ?></td>
                                                <td><?= h($message->created->format('d-M-Y H:i')) ?></td>
                                                <!-- <td><?= h($message->modified) ?></td> -->
                                                <td class="actions">
                                                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $message->id]) ?>
                                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $message->id]) ?> -->
                                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o fa-lg"></i>'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id),'escape' => false, 'class' => 'btn btn-outline-danger btn-sm']) ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>                                    
                                    </div>
                                    <!-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">3</div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">4</div> -->
                                    <!-- start changing divs  -->
                                </div> 

                            </div>
                        </div>
                    <!-- <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                    </div> -->
                </div>

</div>
</div>
</div>


    <!-- overlayed element -->
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

</div>

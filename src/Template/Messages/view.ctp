<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
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
        <li><?= $this->Html->link(__('Edit Message'), ['action' => 'edit', $message->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card shadow mb-5">
                <div class="messages">
                    <?= $this->Form->create($message) ?>
                    <fieldset>
                    <div class="card-header d-flex flex-row align-items-center justify-content-between bg-primary">
                        <!-- <legend><?= __('Add Message') ?></legend> -->
                        <h4 class="m-0 text-white"><?=$message->subject?></h4>
                    </div>
                        <div class="p-4">
                            <?php
                                    echo $this->Form->control('sender_id',['type'=>'text','value'=>$message->user->username,'class'=>'col-md-6','label'=>'From']);
                                    echo $this->Form->control('subject',['value'=>$message->subject]);
                                    echo $this->Form->control('body',['type'=>'textarea','label'=>'Message','value'=>$message->body]);
                            ?>
                        </div>

                    </fieldset>
                    <!-- <div class="row justify-content-center">
                        <div class="col-6 p-3">
                        <?= $this->Form->button(__('Send'),['class'=> 'btn btn-primary form-control']) ?>
                        </div>
                    </div> -->
                    
                    <?= $this->Form->end() ?>
                </div>
            </div>        
        </div>
    </div>
</div>


<!-- <div class="messages view large-9 medium-8 columns content">
    <h3><?= h($message->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $message->has('user') ? $this->Html->link($message->user->id, ['controller' => 'Users', 'action' => 'view', $message->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($message->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Body') ?></th>
            <td><?= h($message->body) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($message->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Id') ?></th>
            <td><?= $this->Number->format($message->sender_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($message->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($message->modified) ?></td>
        </tr>
    </table>
</div> -->

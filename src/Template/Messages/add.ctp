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
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul> 
</nav>-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card shadow mb-5">
                <div class="messages">
                    <?= $this->Form->create($message) ?>
                    <fieldset>
                    <div class="card-header d-flex flex-row align-items-center justify-content-between bg-primary">
                        <!-- <legend><?= __('Add Message') ?></legend> -->
                        <h4 class="m-0 text-white">Compose Message</h4>
                    </div>
                        <div class="p-4">
                            <?php
                                    echo $this->Form->control('sender_id',['type'=>'hidden','value'=>$logged_in_user,'class'=>'col-md-6']);
                                    echo $this->Form->control('recipient_id', ['options' => $users, 'label'=>'To','class'=>'col-md-6']);
                                    echo $this->Form->control('subject');
                                    echo $this->Form->control('body',['type'=>'textarea','label'=>'Message']);
                            ?>
                        </div>

                    </fieldset>
                    <div class="row justify-content-center">
                        <div class="col-6 p-3">
                        <?= $this->Form->button(__('Send'),['class'=> 'btn btn-primary form-control']) ?>
                        </div>
                    </div>
                    
                    <?= $this->Form->end() ?>
                </div>
            </div>        
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personel $personel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Personel'), ['action' => 'edit', $personel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Personel'), ['action' => 'delete', $personel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Personel'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Personel'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personel view large-9 medium-8 columns content">
    <h3><?= h($personel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($personel->Last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($personel->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Names') ?></th>
            <td><?= h($personel->Other_names) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($personel->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($personel->Address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($personel->State) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($personel->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($personel->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone No') ?></th>
            <td><?= h($personel->phone_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('System User Id') ?></th>
            <td><?= h($personel->system_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($personel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($personel->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Updated') ?></th>
            <td><?= h($personel->last_updated) ?></td>
        </tr>
    </table>
</div>

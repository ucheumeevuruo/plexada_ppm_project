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
$this->Paginator->setTemplates([
    'number' => '',
    'nextActive' => '<li class="nav-item"><a class="nav-link navigator" href="{{url}}">{{text}}</a></li>',
    'nextDisabled' => '<li class="nav-item"><a class="nav-link text-gray-300 unclickable" href="#">{{text}}</a></li>',
    'prevActive' => '<li class="nav-item"><a class="nav-link navigator" href="{{url}}">{{text}}</a></li>',
    'prevDisabled' => '<li class="nav-item"><a class="nav-link text-gray-300 unclickable" href="#">{{text}}</a></li>',
    'first' => '',
    'last' => ''
]);
?>
<!-- Menu area [Search, pagination] -->
<!-- I was supposed to put this section in the element template but will do that soon. -->
<nav class="navbar navbar-expand-lg sticky-top mb-4 white-bg navbar-light bg-light shadow">
    <a class="navbar-brand" href="#">Sponsor</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <div class="mr-auto mt-2 mt-lg-0">
            <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-info rounded-0 overlay', 'title' => 'Add', 'escape' => false]) ?>
        </div>
        <div class="col-auto">
        </div>
        <!-- Search Form -->
        <form class="form-inline my-2 my-lg-0" method="get" id="searchable">
            <input class="form-control rounded-0" type="search" name="q" placeholder="Search">
            <button class="btn btn-outline-info rounded-0 my-2 my-sm-0 navigator" type="submit">Search</button>
        </form>
        <!-- ./end Search form -->

        <!-- Pagination -->
        <span class="navbar-text ml-3 pl-4 border-left">
                <?= $this->Paginator->counter(['format' => __('{{count}}  of {{pages}}')]) ?>
            </span>
        <!-- ./end pagination -->

        <div class="mt-2 mt-lg-0">
            <ul class="navbar-nav">
                <?= $this->Paginator->prev(__('<i class="fas fa-less-than fa-1x"></i>'), ['class' => 'test', 'escape' => false]) ?>

                <?= $this->Paginator->next(__('<i class="fas fa-greater-than fa-1x"></i>'), ['escape' => false]) ?>
            </ul>
        </div>
    </div>
</nav>
<!-- .\end Menu Area -->
<div class="container-fluid">
    <div class="br-m mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm" role="grid" aria-describedby="dataTable_info">

                    <thead>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Sponsor Type') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Phone no') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sponsors as $sponsor): ?>
                        <tr>
                            <td><?= h($sponsor->full_name) ?></td>
                            <td><?= $sponsor->has('sponsor_type') ? h($sponsor->sponsor_type->lov_value) : '' ?></td>
                            <td><?= h($sponsor->email) ?></td>
                            <td><?= h($sponsor->phone_no) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fa fa-eye fa-lg"></i>'), ['action' => 'view', $sponsor->id], ['class' => 'overlay text-info', 'title' => 'View', 'escape' => false]) ?>

                                <?= $this->Html->link(__('<i class="fa fa-edit fa-lg"></i>'), ['action' => 'edit', $sponsor->id], ['class' => 'overlay text-warning ml-1', 'title' => 'Edit', 'escape' => false]) ?>

                                <?= $this->Form->postLink(__("<i class='fa fa-trash fa-lg'></i>"), ['action' => 'delete', $sponsor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsor->id), 'escape' => false, 'class' => 'text-danger ml-1']) ?>
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

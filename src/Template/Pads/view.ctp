<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pad $pad
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div style="display: flex; justify-content: space-around">
                <?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i> Edit'), ['action' => 'edit', $pad->id], ['class' => 'btn btn-outline-dark btn-sm overlay', 'title' => 'Edit', 'escape' => false]) ?>
                <?= $this->Html->link(__('<i class="fa fa-trash fa-sm"></i> Delete'), ['action' => 'edit', $pad->id], ['class' => 'btn btn-outline-danger btn-sm overlay', 'title' => 'Delete', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $pad->id)]) ?>
                <?= $this->Form->postLink(__('Delete Pad'), ['action' => 'delete', $pad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pad->id)]) ?>
                <?= $this->Html->link(__('<i class="fa fa-list-ol fa-sm"></i> List Pads'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-sm overlay', 'title' => 'List all Pads', 'escape' => false]) ?>
                <?= $this->Html->link(__('<i class="fa fa-plus fa-sm"></i> New Pad'), ['action' => 'add'], ['class' => 'btn btn-outline-success btn-sm overlay', 'title' => 'Add new Pad', 'escape' => false]) ?>
            </div>
            <br />
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <a class="nav-link active" href="#"><?= __('Details') ?></a>

                    <table class="table table-borderless no-border">
                        <tr>
                            <th scope="row"><?= __('Date') ?></th>
                            <td><?= h($pad->date) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Brief') ?></th>
                            <td><?= h($pad->brief) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Key Players') ?></th>
                            <td><?= h($pad->key_players) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Project Type') ?></th>
                            <td><?= h($pad->project_type) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Project Target') ?></th>
                            <td><?= h($pad->project_target) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Project Details') ?></th>
                            <td><?= h($pad->project_details) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <a class="nav-link active" href="#"><?= __('Costing') ?></a>

                    <table class="table table-borderless no-border">
                        <tr>
                            <th scope="row"><?= __('Currency') ?></th>
                            <td><?= h($pad->currency) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Expected Outcome') ?></th>
                            <td><?= h($pad->expected_outcome) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Conditions') ?></th>
                            <td><?= h($pad->conditions) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Heirarchy Of Objectiv') ?></th>
                            <td><?= h($pad->heirarchy_of_objectiv) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Objective Sub Category') ?></th>
                            <td><?= h($pad->objective_sub_category) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Specific Oobjective') ?></th>
                            <td><?= h($pad->specific_oobjective) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <a class="nav-link active" href="#"><?= __('Indicators') ?></a>

                    <table class="table table-borderless no-border">

                        <tr>
                            <th scope="row"><?= __('First Oindicator') ?></th>
                            <td><?= h($pad->first_oindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Second Oindicator') ?></th>
                            <td><?= h($pad->second_oindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Third Oindicator') ?></th>
                            <td><?= h($pad->third_oindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Forth Oindicator') ?></th>
                            <td><?= h($pad->forth_oindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Fifth Oindicator') ?></th>
                            <td><?= h($pad->fifth_oindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Sixth Oindicator') ?></th>
                            <td><?= h($pad->sixth_oindicator) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <a class="nav-link active" href="#"><?= __('Credit Facility Agreement') ?></a>

                    <table class="table table-borderless no-border">

                        <tr>
                            <th scope="row"><?= __('M E Omethod') ?></th>
                            <td><?= h($pad->m_e_omethod) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Critical Oassumptions') ?></th>
                            <td><?= h($pad->critical_oassumptions) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Specific Aobjective') ?></th>
                            <td><?= h($pad->specific_aobjective) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('First Aindicator') ?></th>
                            <td><?= h($pad->first_aindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Second Aindicator') ?></th>
                            <td><?= h($pad->second_aindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Third Aindicator') ?></th>
                            <td><?= h($pad->third_aindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Forth Aindicator') ?></th>
                            <td><?= h($pad->forth_aindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Fifth Aindicator') ?></th>
                            <td><?= h($pad->fifth_aindicator) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <a class="nav-link active" href="#"><?= __('Hierarchy of Objectives') ?></a>

                    <table class="table table-borderless no-border">

                        <tr>
                            <th scope="row"><?= __('Sixth Aindicator') ?></th>
                            <td><?= h($pad->sixth_aindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('M E Amethod') ?></th>
                            <td><?= h($pad->m_e_amethod) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Critical Aassumptions') ?></th>
                            <td><?= h($pad->critical_aassumptions) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Specific Mobjectives') ?></th>
                            <td><?= h($pad->specific_mobjectives) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('First Mindicator') ?></th>
                            <td><?= h($pad->first_mindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Second Mindicator') ?></th>
                            <td><?= h($pad->second_mindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Third Mindicator') ?></th>
                            <td><?= h($pad->third_mindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Forth Mindicator') ?></th>
                            <td><?= h($pad->forth_mindicator) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4 float-left">
                <div class="table-responsive">
                    <a class="nav-link active" href="#"><?= __('Hierarchy of Objectives') ?></a>

                    <table class="table table-borderless no-border">

                        <tr>
                            <th scope="row"><?= __('Fifth Mindicator') ?></th>
                            <td><?= h($pad->fifth_mindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Sixth Mindicator') ?></th>
                            <td><?= h($pad->sixth_mindicator) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('M E Mmethod') ?></th>
                            <td><?= h($pad->m_e_mmethod) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Critical Massumptions') ?></th>
                            <td><?= h($pad->critical_massumptions) ?></td>
                        </tr>

                        <tr>
                            <th scope="row"><?= __('Project Amount') ?></th>
                            <td><?= $this->Number->format($pad->project_amount) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Funding Agency') ?></th>
                            <td><?= $this->Number->format($pad->funding_agency) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Due Date') ?></th>
                            <td><?= h($pad->due_date) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Deadline') ?></th>
                            <td><?= h($pad->deadline) ?></td>
                        </tr>
                    </table>
                </div>
            </div>


            <div class="pads view large-9 medium-8 columns content">
                <?php
                //    <h3><?= h($pad->id)
                ?>
                <!--</h3>-->

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('File Upload') ?></th>
                        <td><?= h($pad->file_upload) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($pad->id) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
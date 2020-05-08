<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetailOld $projectDetail
 */
$this->start('sidebar');
echo $this->element('sidebar/default');
$this->end();
$this->start('navbar');
echo $this->element('navbar/default');
$this->end();
?>

<?php echo $this->Html->css('report'); ?>

<div class="container-fluid">
    <dov class="card-deck">
        <span class="border border-white p-4 card mx-auto font-weight-bold font nav active"
            style=" font-size: 20px;">Summary</span>
        <span class="border border-white p-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Milestones</span>
        <span class="border border-white p-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Activities</span>
        <span class="border border-white p-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Resources</span>
        <span class="border border-white p-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Partners</span>
        <span class="border border-white p-4 card mx-auto font-weight-bold font nav" style=" font-size: 20px;">Risks &
            Issues</span>
        <span class="border border-white p-4 card mx-auto font-weight-bold font nav" style=" font-size: 20px;">Gand
            Charts</span>

    </dov>
    <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($projectDetails->name) ?>
    </h2>
    <div class="shadow mb-4 br-m">
        <div class="py-3 pl-3 bg-default br-t">
            <div class="card-deck mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Project Brief</h5>
                        <p class="card-text"><?= h($projectDetails->description) ?></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Objectives</h5>
                        <p class="card-text"><?= h($projectDetails->description) ?></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Sponsors & Donors</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                    </div>
                </div>
            </div>
            <div class="card-deck mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Budget and Expense</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">PPA</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer .</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">MDA</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                </div>
            </div>
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Completed Milestones</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer .</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">DLI</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-primary">Risk & Issues</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<style>
.edit-icon{
    position:absolute;
    top:0;
    right:0;
}
</style>


<?php echo $this->Html->css('report'); ?>

<div class="container">
    <div class="card-deck">
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Summary', ['controller' => 'projects', 'action' => 'report', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav active"
            style=" font-size: 20px;">Indicators</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Activities', ['controller' => 'projects', 'action' => 'activities', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Resources</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">
            <?= $this->Html->link('Partners', ['controller' => 'projectDetails', 'action' => 'partners', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold font nav"
            style=" font-size: 20px;">Gantt
            Charts</span>
        <span class="border border-white p-2 pt-4  pb-4 card mx-auto font-weight-bold  nav" style=" font-size: 20px;">
            <?= $this->Html->link('Documents', ['controller' => 'projects', 'action' => 'documents', $project->id], ['id' => 'transmit', 'class' => 'nav-col']) ?>
        </span>


    </div>

    <div class="d-flex justify-content-between align-items-end">
        <h2 class="text-primary text-left font-weight-bold mt-3"><?= h($project->name) ?> Indicators</h2>
        <span aria-hidden="true" class=""><?= $this->Html->link(__('<i class="fa fa-plus fa-3x" aria-hidden="true"></i>'), ['controller' => 'milestones','action' => 'add', $project->id], ['escape' => false, 'class' => 'btn btn-outline-primary btn-sm overlay']) ?></span>
    </div>

    <div class="mb-4 br-m shad">
        <div class="py-3 pl-3 bg-default br-t">
            <div class="card-deck mb-3">
                <?php foreach ($project->milestones as $milestones) : ?>
                <?php if ($milestones->status_id == 3) {
                        $indicate = '&#x2714;';
                    } else {
                        $indicate = '&#x2716;';
                    }
                    ?>

                <span aria-hidden="true" class="indicator"><?= $indicate ?></span>
                <div class="card card-outline shadow">
                    <div class="card-body">
                        <span aria-hidden="true" class="edit-icon"><?= $this->Html->link(__('<i class="fa fa-pencil fa-sm"></i>'), ['controller' => 'milestones','action' => 'edit', $milestones->id], ['escape' => false, 'class' => 'btn btn-outline-primary btn-sm overlay']) ?></span>
                        <p class="card-text">
                            <?= $this->Html->link($milestones->description, ['controller' => 'milestones', 'action' => 'view', $milestones->id]) ?>
                        </p>
                    </div>
                    
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


</div>
<div id="dialogModal" class="bg-primary">
    <!-- the external content is loaded inside this tag -->
    <div id="contentWrap">
        <?= $this->Modal->create(['id' => 'MyModal4', 'size' => 'modal-md']) ?>
        <?= $this->Modal->body()// No header ?>
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
</script>
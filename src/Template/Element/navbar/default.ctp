<nav class="navbar navbar-expand navbar-light bg-white topbar  py-5 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button> -->
    <?php echo $this->Html->image('LOGO.png', array('alt' => 'ogunlogo', 'class' => 'w-15')); ?>
    <!-- 
                    <!-- Topbar Search -->
    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-search fa-fw"></i>
                            </a> -->
        <!-- Dropdown - Messages -->
        <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fa fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> -->
        <!-- Nav Item - Alerts -->
        <!-- <li> -->
        <!-- </li> -->

        <li class="nav-item dropdown no-arrow mx-1">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell fa-fw"></i>
                                
                                <span class="badge badge-danger badge-counter">3</span>
                            </a> -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <!-- <h6 class="dropdown-header">
                                    Alerts Center
                                </h6> -->
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a> -->
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        Project has been completed!
                                    </div>
                                </a> -->
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a> -->
                <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <!-- <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="/messages" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-spinner fa-pulse" style="color: blue !important"></i>

                <span class="badge badge-danger badge-counter"><?= $this->Message->getProjects() ?></span>
            </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="/messages" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-spinner fa-spin fa-fw"></i>

                <span class="badge badge-danger badge-counter"><?= $this->Message->getProjects() ?></span>
            </a>
        </li> -->
        <?php if ($this->Message->tasksCount() != 0) : ?>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="/messages" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Tasks Overdue ">
                    <i class="fa fa-spinner fa-pulse bg-gradient-primary"></i>

                    <span class="badge badge-danger badge-counter"><?= $this->Message->tasksCount() ?></span>
                </a>

                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dLabel">
                    <h6 class="dropdown-header">List of Tasks that are overdue</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>S/no</td>
                                <td>Task Name</td>
                                <td>Date Due</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 1; ?>
                            <?php foreach ($this->Message->getTasks() as $task) : ?>
                                <tr>
                                    <td><?= h($num++) ?></td>
                                    <td>
                                        <?= $this->Html->link(__($task->Task_name), ['controller' => 'tasks', 'action' => 'view', $task->id], []) ?>
                                    </td>
                                    <td><?= h(($task->Start_date)->format('d/m/Y')) ?></td>

                                    <td>Open</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>


                </div>
            </li>
        <?php endif; ?>

        <?php if ($this->Message->activitiesCount() != 0) : ?>

            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="/messages" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Activities Overdue ">
                    <i class="fa fa-spinner fa-spin bg-gradient-info"></i>

                    <span class="badge badge-danger badge-counter"><?= $this->Message->activitiesCount() ?></span>
                </a>

                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dLabel">
                    <h6 class="dropdown-header">List of Activities that are overdue </h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>S/no</td>
                                <td>Activity Name</td>
                                <td>Date Due</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 1; ?>
                            <?php foreach ($this->Message->getActivities() as $activity) : ?>
                                <tr>
                                    <td><?= h($num++) ?></td>
                                    <td>
                                        <?= $this->Html->link(__($activity->name), ['controller' => 'activities', 'action' => 'view', $activity->activity_id], []) ?>
                                    </td>
                                    <td><?= h(($activity->start_date)->format('d/m/Y')) ?></td>

                                    <td>Open</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>


                </div>
            </li>
        <?php endif; ?>

        <?php if ($this->Message->indicatorsCount() != 0) : ?>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="/messages" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Indicators Overdue ">
                    <i class="fa fa-cog slow-spin fa-spin bg-gradient-warning"></i>

                    <span class="badge badge-danger badge-counter"><?= $this->Message->indicatorsCount() ?></span>
                </a>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dLabel">
                    <h6 class="dropdown-header">List of Indicators that are overdue</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>S/no</td>
                                <td>Activity Name</td>
                                <td>Date Due</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 1; ?>
                            <?php foreach ($this->Message->getIndicators() as $indicator) : ?>
                                <tr>
                                    <td><?= h($num++) ?></td>
                                    <td>
                                        <?= $this->Html->link(__($indicator->name), ['controller' => 'milestones', 'action' => 'view', $indicator->id], []) ?>
                                    </td>
                                    <td><?= h(($indicator->start_date)->format('d/m/Y')) ?></td>
                                    <td>Open</td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>


                </div>
            </li>

        <?php endif; ?>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?= $this->Message->getMessageCount() ?></span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dLabel">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <?php foreach ($this->Message->getMessages() as $message) : ?>
                    <?= $this->Html->link(
                        __('<div class="dropdown-list-image mr-3">
                                            <div class="icon-circle bg-dark">
                                                <i class="fas fa-user text-white"></i>
                                                <div class="status-indicator bg-success"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">' . $message->subject . '</div>
                                            <div class="small text-gray-500">' . $message->user->username . ' ' . $message->created->format('d/m/yy') . '</div>
                                        </div>'),
                        ['controller' => 'messages', 'action' => 'view', $message->id],
                        ['class' => 'dropdown-item d-flex align-items-center', 'title' => 'Message', 'escape' => false]
                    ) ?>
                <?php endforeach; ?>
                <?= $this->Html->link(
                    __('View All Messages'),
                    ['controller' => 'messages', 'action' => 'index'],
                    ['class' => 'dropdown-item text-center small text-gray-500', 'title' => 'All', 'escape' => false]
                ) ?>
            </div>
        </li>
        <!-- Nav Item - Messages -->
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize"><?= ($_SESSION['Auth']['Users']['full_name']) ?></span>
                <!--                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fa fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <?= $this->Html->link(
                    __('<i class="fa fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> logout'),
                    ['controller' => 'staff', 'action' => 'logout'],
                    ['class' => 'dropdown-item', 'title' => 'Logout', 'escape' => false]
                ) ?>
            </div>
        </li>

    </ul>

</nav>
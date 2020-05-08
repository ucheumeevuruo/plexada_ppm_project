<?php echo $this->Html->css('sidebar'); ?>


<aside class="navbar navbar-nav sidebar cover sidebar-primary sb" id="">

    <ul class="side-container">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item side-text">
            <?= $this->Html->link(__('<i class="fa fa-line-chart fa-lg side-text"></i> &nbsp;Dashboard'), ['controller' => 'Dashboard', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link side-text']) ?>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider m-0 w-100 mb-3">

        <h5 class="text-default font-weight-bold m-0 pb-2 text-center">
            User Options
        </h5>
        <hr class="sidebar-divider  mx-auto my-0 w-25 px-5">


        <li class="dropdown nav-item ">
            <a href="#" class="dropdown-toggle  nav-link side-text" data-toggle="dropdown" role="button"
                aria-expanded="false">
                <i class="fa fa-archive fa-lg"></i>
                Projects <span class="caret "></span>
            </a>
            <ul class="dropdown-menu py-0" role="menu">
                <li class="nav-item">
                    <?= $this->Html->link(
                        __('<i class="fa fa-archive fa-lg"></i> &nbsp;Project List'),
                        ['controller' => 'Projects', 'action' => 'index'],
                        ['escape' => false, 'class' => 'nav-link collapsed my-0 dropout']
                    ) ?>
                </li>
                <hr class="sidebar-divider m-0 bg-primary">
                <li class="nav-item">
                    <?= $this->Html->link(
                        __('<i class="fa fa-archive fa-lg"></i> &nbsp;PAD'),
                        ['controller' => 'ProjectDetails', 'action' => 'index'],
                        ['escape' => false, 'class' => 'nav-link collapsed my-0 dropout']
                    ) ?>
                </li>
                <hr class="sidebar-divider m-0 bg-primary">


                <li class="nav-item">
                    <?= $this->Html->link(
                        __('<i class="fa fa-archive fa-lg"></i> &nbsp;PPF'),
                        ['controller' => 'ProjectFundings', 'action' => 'index'],
                        ['escape' => false, 'class' => 'nav-link collapsed my-0 dropout']
                    ) ?>
                </li>
                <hr class="sidebar-divider m-0 bg-primary">

                <!-- <hr class="sidebar-divider m-0 bg-primary"> -->
                <li class="nav-item">
                    <?= $this->Html->link(
                        __('<i class="fa fa-archive fa-lg"></i> &nbsp;PIM'),
                        ['controller' => 'Pims', 'action' => 'index'],
                        ['escape' => false, 'class' => 'nav-link collapsed my-0 dropout']
                    ) ?>
                    <!-- </p> -->
                </li>
                <!-- <hr class="sidebar-divider m-0 bg-primary"> -->

            </ul>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->

        <!-- fdgfd -->
        <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle side-text nav-link" data-toggle="dropdown" role="button"
                aria-expanded="false">
                <i class="fa fa-archive fa-lg"></i>
                M & E <span class="caret"></span>
            </a>
            <ul class="dropdown-menu py-0" role="menu">
                <li class="nav-item m-0">
                    <?= $this->Html->link(
                        __('<i class="fa fa-desktop fa-lg"></i> &nbsp;Progress Report'),
                        ['controller' => 'ProjectDetails', 'action' => 'evaluation'],
                        ['escape' => false, 'class' => 'nav-link collapsed collapsed my-0 dropout']
                    ) ?>
                </li>
                <hr class="sidebar-divider m-0 bg-primary">
                <li class="nav-item">
                    <?= $this->Html->link(
                        __('<i class="fa fa-archive fa-lg "></i> &nbsp;Consolidated Report'),
                        ['controller' => 'ProjectDetails', 'action' => 'consolidated'],
                        ['escape' => false, 'class' => 'nav-link collapsed  my-0 dropout']
                    ) ?>
                </li>
                <hr class="sidebar-divider m-0 bg-primary">
            </ul>
        </li>
        <!-- dsdsfds -->
        <hr class="sidebar-divider m-0">

        <!-- Divider -->
        <hr class="sidebar-divider mx-0 w-100">

        <!-- Heading -->
        <h5 class="text-default m-0 text-center pb-2 font-weight-bold">
            Administrative Options
        </h5>
        <hr class="sidebar-divider mx-auto my-0 w-50 px-5 ">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item m-0">
            <?= $this->Html->link(
                __('<i class="fa fa-user-o fa-lg"></i> &nbsp;Personnel'),
                ['controller' => 'Staff', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link collapsed side-text']
            ) ?>
        </li>
        <hr class="sidebar-divider m-0">

        <li class="nav-item m-0">
            <?= $this->Html->link(
                __('<i class="fa fa-list fa-lg"></i> &nbsp;List of Values'),
                ['controller' => 'Lov', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link collapsed side-text']
            ) ?>
        </li>
        <hr class="sidebar-divider m-0">

        <li class="nav-item">
            <?= $this->Html->link(
                __('<i class="fa fa-user-circle-o fa-lg"></i> &nbsp;Donors'),
                ['controller' => 'Vendors', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link collapsed side-text']
            ) ?>
        </li>
        <hr class="sidebar-divider mx-0">

        <li class="nav-item">
            <?= $this->Html->link(
                __('<i class="fa fa-user fa-lg"></i> &nbsp;Sponsors'),
                ['controller' => 'Sponsors', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link collapsed side-text']
            ) ?>
        </li>
        <hr class="sidebar-divider mx-0">

        <li class="nav-item">
            <?= $this->Html->link(
                __('<i class="fa fa-cube fa-lg"></i> &nbsp;Roles'),
                ['controller' => 'Roles', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link collapsed side-text']
            ) ?>
        </li>
        <hr class="sidebar-divider mx-0">

        <li class="nav-item">
            <?= $this->Html->link(
                __('<i class="fa fa-users fa-lg "></i> &nbsp;Users'),
                ['controller' => 'Users', 'action' => 'index'],
                ['escape' => false, 'class' => 'nav-link collapsed side-text']
            ) ?>
        </li>
        <hr class="sidebar-divider mx-0">

    </ul>


</aside>
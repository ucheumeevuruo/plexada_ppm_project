<ul class="navbar navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <?= $this->Html->link(__('<i class="fa fa-line-chart fa-lg"></i> &nbsp;Dashboard'), ['controller' => 'Dashboard', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link']) ?>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider m-0 w-100">

    <!-- Heading -->

    <h5 class="text-light m-0">
        User Options
    </h5>
    <hr class="bg-light my-0 px-5">

    <li class="dropdown nav-item">
        <a href="#" class="dropdown-toggle text-light nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-archive fa-lg"></i>
            Projects <span class="caret"></span>
        </a>
        <ul class="dropdown-menu py-0" role="menu">

            <li class="nav-item">
            <!-- <p> -->
                <?= $this->Html->link(__('<i class="fa fa-archive fa-lg text-primary"></i> &nbsp;Appraisal'),
                    ['controller' => 'ProjectDetails', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed text-primary my-0']) ?>
            </li>
            <!-- </p> -->

            <hr class="sidebar-divider m-0 bg-primary">
            <li class="nav-item">
            <!-- <p> -->
                <?= $this->Html->link(__('<i class="fa fa-archive fa-lg text-primary"></i> &nbsp;Implementation'),
                    ['controller' => 'Pims', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed text-primary my-0']) ?>
            <!-- </p> -->
            </li>

            <!-- <hr class="sidebar-divider m-0 bg-primary"> -->

        </ul>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider mx-0 w-100">

    <!-- Heading -->
    <h5 class="text-light m-0 text-left">
        Administrative Options
    </h5>
    <hr class="bg-light mx-auto my-0 px-5">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item m-0">
        <?= $this->Html->link(__('<i class="fa fa-user-o fa-lg"></i> &nbsp;Personnel'),
            ['controller' => 'Staff', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
    </li>
    <hr class="sidebar-divider m-0">

    <li class="nav-item m-0">
        <?= $this->Html->link(__('<i class="fa fa-list fa-lg"></i> &nbsp;List of Values'),
            ['controller' => 'Lov', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
    </li>
    <hr class="sidebar-divider m-0">

    <li class="nav-item">
        <?= $this->Html->link(__('<i class="fa fa-user-circle-o fa-lg"></i> &nbsp;Donors'),
            ['controller' => 'Vendors', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
    </li>
    <hr class="sidebar-divider mx-0">

    <li class="nav-item">
        <?= $this->Html->link(__('<i class="fa fa-user fa-lg"></i> &nbsp;Sponsors'),
            ['controller' => 'Sponsors', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
    </li>
    <hr class="sidebar-divider mx-0">

    <li class="nav-item">
        <?= $this->Html->link(__('<i class="fa fa-cube fa-lg"></i> &nbsp;Roles'),
            ['controller' => 'Roles', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
    </li>

</ul>

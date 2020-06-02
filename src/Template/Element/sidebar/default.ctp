<?php echo $this->Html->css('sidebar'); ?>

<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <!--            <i class="fas fa-laugh-wink"></i>-->
        </div>
        <!--                <div class="sidebar-brand-text mx-3">Project Management <sup>2</sup></div>-->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php if ($_SESSION['role'] == "Project Executive" or $_SESSION['role'] == "Administrator" ){ ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <?= $this->Html->link(__('<i class="fa fa-line-chart fa-lg"></i> &nbsp;Dashboard'), ['controller' => 'Dashboard', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link']) ?>
        <!--        <a class="nav-link" href="index.html">-->
        <!--            <i class="fas fa-fw fa-tachometer-alt"></i>-->
        <!--            <span>Dashboard</span></a>-->
    </li>
    <?php } ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Options
    </div>
    <?php if ($_SESSION['role'] == "Project Executive" or $_SESSION['role'] == "Administrator" or $_SESSION['role'] == "Project Manager"){ ?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <!--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->
        <!--            <i class="fas fa-fw fa-cog"></i>-->
        <!--            <span>Components</span>-->
        <!--        </a>-->
        <?= $this->Html->link(
            __('<i class="fa fa-archive fa-lg"></i> &nbsp;Projects'),
            ['controller' => 'Projects', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link collapsed']
        ) ?>
        <!--        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
        <!--            <div class="bg-white py-2 collapse-inner rounded">-->
        <!--                <h6 class="collapse-header">Custom Components:</h6>-->
        <!--                <a class="collapse-item" href="buttons.html">Buttons</a>-->
        <!--                <a class="collapse-item" href="cards.html">Cards</a>-->
        <!--            </div>-->
        <!--        </div>-->
    </li>
    <?php } ?>
    <?php if ($_SESSION['role'] == "Project Executive" or $_SESSION['role'] == "Administrator"){ ?>
    <li class="nav-item">
        <!--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->
        <!--            <i class="fas fa-fw fa-cog"></i>-->
        <!--            <span>Components</span>-->
        <!--        </a>-->
        <a href="#collapseExample1" class="nav-link collapsed" data-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="collapseExample1">
            <i class="fa fa-archive fa-lg"></i> &nbsp;M & E</a>

        <div class="collapse" id="collapseExample1">
            <div class="">
                <?= $this->Html->link(
                    __('<i class="fa fa-archive fa-lg "></i> &nbsp;Planning'),
                    ['controller' => 'Projects', 'action' => 'planning'],
                    ['escape' => false, 'class' => 'nav-link collapsed dark']
                ) ?>
                <?= $this->Html->link(
                    __('<i class="fa fa-archive fa-lg "></i> &nbsp;Monitoring'),
                    ['controller' => 'Projects', 'action' => 'monitoring'],
                    ['escape' => false, 'class' => 'nav-link collapsed dark']
                ) ?>
                <?= $this->Html->link(
                    __('<i class="fa fa-archive fa-lg "></i> &nbsp;Disbursement'),
                    ['controller' => 'Projects', 'action' => 'disbursement'],
                    ['escape' => false, 'class' => 'nav-link collapsed dark']
                ) ?>
            </div>
        </div>
    </li>
    <?php } ?>
    <?php if ($_SESSION['role'] == "Project Executive" or $_SESSION['role'] == "Administrator" or $_SESSION['role'] == "DPPC"){ ?>
    <li class="nav-item">
    <a href="#collapseExample2" class="nav-link collapsed" data-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="collapseExample2">
            <i class="fa fa-archive fa-lg"></i> &nbsp;DPPC</a>

        <div class="collapse" id="collapseExample2">
            <a href="#collapseExample" class="nav-link collapsed" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="collapseExample">
                <i class="fa fa-archive fa-lg"></i> &nbsp;Reports</a>
        </div>

        <div class="collapse" id="collapseExample">
            <div class="">
                <?= $this->Html->link(
                    __('<i class="fa fa-desktop fa-lg"></i> &nbsp;Progress Report'),
                    ['controller' => 'ProjectDetails', 'action' => 'evaluation'],
                    ['escape' => false, 'class' => 'nav-link collapsed dark']
                ) ?>
                <?= $this->Html->link(
                    __('<i class="fa fa-archive fa-lg "></i> &nbsp;Consolidated Report'),
                    ['controller' => 'ProjectDetails', 'action' => 'consolidated'],
                    ['escape' => false, 'class' => 'nav-link collapsed dark']
                ) ?>
            </div>
        </div>
    </li>
    <?php } ?>
    <li class="nav-item">
        <!--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->
        <!--            <i class="fas fa-fw fa-cog"></i>-->
        <!--            <span>Components</span>-->
        <!--        </a>-->

    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!--    <li class="nav-item">-->
    <!--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">-->
    <!--            <i class="fas fa-fw fa-wrench"></i>-->
    <!--            <span>Utilities</span>-->
    <!--        </a>-->

    <!--        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">-->
    <!--            <div class="bg-white py-2 collapse-inner rounded">-->
    <!--                <h6 class="collapse-header">Custom Utilities:</h6>-->
    <!--                <a class="collapse-item" href="utilities-color.html">Colors</a>-->
    <!--                <a class="collapse-item" href="utilities-border.html">Borders</a>-->
    <!--                <a class="collapse-item" href="utilities-animation.html">Animations</a>-->
    <!--                <a class="collapse-item" href="utilities-other.html">Other</a>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </li>-->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if ($_SESSION['role'] == "Project Executive" or $_SESSION['role'] == "Administrator" ){ ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Administrative options
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <!--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">-->
        <!--            <i class="fas fa-fw fa-folder"></i>-->
        <!--            <span>Pages</span>-->
        <!--        </a>-->
        <?= $this->Html->link(
            __('<i class="fa fa-user fa-lg"></i> &nbsp;Personnel'),
            ['controller' => 'Staff', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link collapsed']
        ) ?>
        <!-- <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">-->
        <!--            <div class="bg-white py-2 collapse-inner rounded">-->
        <!--                <h6 class="collapse-header">Login Screens:</h6>-->
        <!--                <a class="collapse-item" href="login.html">Login</a>-->
        <!--                <a class="collapse-item" href="register.html">Register</a>-->
        <!--                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>-->
        <!--                <div class="collapse-divider"></div>-->
        <!--                <h6 class="collapse-header">Other Pages:</h6>-->
        <!--                <a class="collapse-item" href="404.html">404 Page</a>-->
        <!--                <a class="collapse-item" href="blank.html">Blank Page</a>-->
        <!--            </div> -->
        <!--        </div> -->
    </li>
    <li class="nav-item">
        <?= $this->Html->link(
            __('<i class="fa fa-list fa-lg"></i> &nbsp;List of Values'),
            ['controller' => 'Lov', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link collapsed']
        ) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link(
            __('<i class="fa fa-list fa-lg"></i> &nbsp;Currencies'),
            ['controller' => 'Currencies', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link collapsed']
        ) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link(
            __('<i class="fa fa-user-circle fa-lg"></i> &nbsp;Donors'),
            ['controller' => 'Vendors', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link collapsed']
        ) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link(
            __('<i class="fa fa-user fa-lg"></i> &nbsp;Sponsors'),
            ['controller' => 'Sponsors', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link collapsed']
        ) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link(
            __('<i class="fa fa-cube fa-lg"></i> &nbsp;Roles'),
            ['controller' => 'Roles', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link collapsed']
        ) ?>
    </li>
    <li class="nav-item">
        <?= $this->Html->link(
            __('<i class="fa fa-user fa-lg"></i> &nbsp;Users'),
            ['controller' => 'Users', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link collapsed']
        ) ?>
    </li>
    <!-- Nav Item - Charts -->
    <!--    <li class="nav-item">-->
    <!--        <a class="nav-link" href="charts.html">-->
    <!--            <i class="fas fa-fw fa-chart-area"></i>-->
    <!--            <span>Charts</span></a>-->
    <!--    </li>-->

    <!-- Nav Item - Tables -->
    <!--    <li class="nav-item">-->
    <!--        <a class="nav-link" href="tables.html">-->
    <!--            <i class="fas fa-fw fa-table"></i>-->
    <!--            <span>Tables</span></a>-->
    <!--    </li>-->

    <!-- Divider -->
    <!--    <hr class="sidebar-divider d-none d-md-block">-->

    <!-- Sidebar Toggler (Sidebar) -->
    <!--    <div class="text-center d-none d-md-inline">-->
    <!--        <button class="rounded-circle border-0" id="sidebarToggle"></button>-->
    <!--    </div>-->

<?php } ?> 
</ul>
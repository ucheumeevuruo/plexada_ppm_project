<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <?= $this->Html->link(__('<i class="fa fa-line-chart fa-lg"></i> &nbsp;Dashboard'), ['controller' => 'Dashboard', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link']) ?>
<!--        <a class="nav-link" href="index.html">-->
<!--            <i class="fas fa-fw fa-tachometer-alt"></i>-->
<!--            <span>Dashboard</span></a>-->
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mx-0">

    <!-- Heading -->
    <div class="sidebar-heading text-large">
        User Options
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <?= $this->Html->link(__('<i class="fa fa-archive fa-lg"></i> &nbsp;Implementation'),
            ['controller' => 'Pims', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
    </li>
    <hr class="sidebar-divider mx-0">
    <li class="nav-item">
<!--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->
<!--            <i class="fas fa-fw fa-cog"></i>-->
<!--            <span>Components</span>-->
<!--        </a>-->
        <?= $this->Html->link(__('<i class="fa fa-archive fa-lg"></i> &nbsp;Projects'),
            ['controller' => 'ProjectDetails', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mx-0">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrative options
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <?= $this->Html->link(__('<i class="fa fa-user-o fa-lg"></i> &nbsp;Personnel'),
            ['controller' => 'Staff', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
    </li>
    <hr class="sidebar-divider mx-0">

    <li class="nav-item">
        <?= $this->Html->link(__('<i class="fa fa-list fa-lg"></i> &nbsp;List of Values'),
            ['controller' => 'Lov', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link collapsed']) ?>
    </li>
    <hr class="sidebar-divider mx-0">

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

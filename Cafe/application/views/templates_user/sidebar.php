<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('index.php/user/dashboard_user')?> ">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fa fa-user" aria-hidden="true"> </i>
                </div>
                <div class="sidebar-brand-text mx-3">USER</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('index.php/user/dashboard_user')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/user/data_cafe')?>">
                    <i class="fa fa-coffee" aria-hidden="true"> </i>
                    <span>Data Cafe</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('about/about.php')?>">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    <span>About</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php')?>">
                    <i class="fa fa-globe"aria-hidden="true"></i>
                    <span>Menu</span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <ul class="na navbar-nav navbar-right">
                        <?php if($this->session->userdata('username')){ ?>
                            <li><div>Selamat Datang <?php echo $this->session->userdata('username') ?></div></li>
                            <li class="ml-4"><?php echo anchor('auth/logout','Logout') ?> </li>
                        <?php } else { ?>
                            <li><?php echo anchor('auth/login','Login');  ?></li>
                                
                        </ul>
                    <?php } ?>

                </ul>
                    </ul>

                </nav>
                <!-- End of Topbar -->
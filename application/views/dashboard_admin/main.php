<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIHEDEM | Admin Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
    </head>
    
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"> Menu Admin</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">Menu Admin</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('resources/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Admin</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo site_url('resources/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">

                                    <p>
                                        Admin
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata('USERNAME'); ?></p
>                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                          <ul class="sidebar-menu">
                            <li class="header">Menu Utama</li>
                            <li class="treeview">
                              <a href="<?php echo site_url('permohonan_perbaikan/indexpermohonan');?>">
                                <i class="fa fa-edit"></i> <span>Kelola Permohonan Perbaikan</span>
                              </a>
                            </li>
                            <li class="treeview">
                              <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span>View Laporan </span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('penilaian_kerusakan/indexlaporan');?>"><i class="fa fa-circle-o"></i> Survei Kerusakan</a></li>
                                <li><a href="<?php echo site_url('laporan_progres/indexlaporan');?>"><i class="fa fa-circle-o"></i> Progress Pembangunan</a></li>
                              </ul>
                            </li>

                            <li class="treeview">
                              <a href="#">
                                <i class="fa fa-user"></i> <span>Kelola Akun</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('kelola_sekolah/index');?>"><i class="fa fa-circle-o"></i> Kepala Sekolah</a></li>
                                <li><a href="<?php echo site_url('Kelola_Konsultan/index');?>"><i class="fa fa-circle-o"></i> Konsultan</a></li>
                                <li><a href="<?php echo site_url('Kelola_Surveyor/index');?>"><i class="fa fa-circle-o"></i> Surveyor</a></li>
                              </ul>
                            </li>
                             <li class="treeview">
                                <a href="#">
                                <i class="fa fa-calendar-check-o"></i>
                                <span>Penugasan Konsultan</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('penugasan_konsultan/add');?>"><i class="fa fa-edit"></i> Input Penugasan</a></li>
                                <li><a href="<?php echo site_url('penugasan_konsultan/index');?>"><i class="fa fa-files-o"></i> View List Penugasan</a></li>
                              </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                <i class="fa fa-calendar-check-o"></i>
                                <span>Penugasan Surveyor</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('Penugasan_surveyor/add');?>"><i class="fa fa-edit"></i> Input Penugasan</a></li>
                                <li><a href="<?php echo site_url('Penugasan_surveyor/index');?>"><i class="fa fa-files-o"></i> View List Penugasan</a></li>
                              </ul>
                            </li>
                            <li class="header"></li>
                            <li class="treeview">
                              <a href="<?php echo base_url();?>auth/logout">
                                <i class="fa fa-sign-out"></i> <span>Keluar</span>
                              </a>
                            </li>

                          </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Selamat datang di <a href="#">SIHEDEM</a></strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
    </body>
</html>

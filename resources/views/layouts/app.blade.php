<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management System</title>
    <!-- Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset-management-system/vendor/img/favicon.ico') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset-management-system/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset-management-system/dist/css/adminlte.min.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!--start wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-light">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- end Navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/dashboard') }}" class="brand-link">
                <span class="brand-text font-weight-light">
                    <h6 align="center"><strong>Asset Management System</strong></h6>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

               <!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('asset-management-system/dist/img/avatar.jpg') }}" 
             class="img-circle elevation-2" 
             alt="{{ Auth::user()->name }}">
    </div>
    <div class="info">
        <a href="{{ route('users.show', Auth::user()->id) }}" class="d-block">
            {{ Auth::user()->name }}
        </a>
    </div>
</div>
<!-- end sidebar -->




                <!-- Start Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Dashboard Link -->
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <!-- Assets Menu Item -->
        <li class="nav-item has-treeview menu-open">
            <a href="{{ route('assets.index') }}" class="nav-link active">
                <i class="nav-icon fa fa-boxes"></i>
                <p>
                    Assets
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="nav-icon fa big-icon fa-tags"></i>
                <p>
                    Categories
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('floors.index') }}" class="nav-link">
                <i class="nav-icon fa big-icon fa-building"></i>
                <p>
                    Floors
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('departments.index') }}" class="nav-link">
                <i class="nav-icon fa big-icon fa-sitemap"></i>
                <p>
                    Departments
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('maintenance.index') }}" class="nav-link">
                <i class="nav-icon fa big-icon fa-wrench"></i>
                <p>
                    Maintenance
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa big-icon fa-chart-bar"></i>
                <p>
                    Reports
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('reports.inventory') }}" class="nav-link">
                        <i class="nav-icon fa fa-warehouse"></i>
                        <p>Inventory</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reports.assigned') }}" class="nav-link">
                        <i class="nav-icon fa fa-user-check"></i>
                        <p>Assigned Assets</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reports.maintenance') }}" class="nav-link">
                        <i class="nav-icon fa fa-tools"></i>

                        <p>Maintenance Cost</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reports.retired') }}" class="nav-link">
                        <i class="nav-icon fa fa-archive"></i>

                        <p>Retired Assets</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reports.warranty') }}" class="nav-link">
                        <i class="nav-icon fa fa-shield-alt"></i>
                        <p>Warranty</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ url('/logout') }}" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- End Sidebar Menu -->




        </aside>
        <!-- End Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- End Content Wrapper. Contains page content -->


        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="{{ url('/dashboard') }}">Asset Management System</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Footer</b>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

    </div>
    <!-- end wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('asset-management-system/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('asset-management-system/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset-management-system/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('asset-management-system/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('asset-management-system/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('asset-management-system/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('asset-management-system/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('asset-management-system/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('asset-management-system/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('asset-management-system/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('asset-management-system/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('asset-management-system/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('asset-management-system/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset-management-system/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('asset-management-system/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('asset-management-system/dist/js/pages/dashboard.js') }}"></script>

</body>

</html>
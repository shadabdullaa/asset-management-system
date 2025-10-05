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

    <!-- Custom Styles -->
    <style>
        /* Ensure all user avatars are perfect circles */
        #sidebar-avatar,
        .img-circle {
            border-radius: 50% !important;
            width: 45px;
            height: 45px;
            object-fit: cover;
            border: 2px solid #6c757d33; /* optional subtle border */
        }

        /* Slightly larger avatar on profile pages */
        .profile-user-img {
            width: 150px;
            height: 150px;
        }

        @media (max-width: 576px) {
            #sidebar-avatar {
                width: 40px;
                height: 40px;
            }
            .profile-user-img {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Navbar -->

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
            <!-- Sidebar user panel -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img id="sidebar-avatar"
                         src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('asset-management-system/dist/img/avatar.jpg') }}"
                         class="elevation-2"
                         alt="{{ Auth::user()->name }}">
                </div>
                <div class="info">
                    <a href="{{ route('users.show', Auth::user()->id) }}" class="d-block">
                        {{ Auth::user()->name }}
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link {{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- Assets -->
                    <li class="nav-item">
                        <a href="{{ route('assets.index') }}" class="nav-link {{ request()->routeIs('assets.*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-boxes"></i>
                            <p>Assets</p>
                        </a>
                    </li>

                    <!-- Categories -->
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-tags"></i>
                            <p>Categories</p>
                        </a>
                    </li>

                    <!-- Floors -->
                    <li class="nav-item">
                        <a href="{{ route('floors.index') }}" class="nav-link {{ request()->routeIs('floors.*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-building"></i>
                            <p>Floors</p>
                        </a>
                    </li>

                    <!-- Departments -->
                    <li class="nav-item">
                        <a href="{{ route('departments.index') }}" class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-sitemap"></i>
                            <p>Departments</p>
                        </a>
                    </li>

                    <!-- Maintenance -->
                    <li class="nav-item">
                        <a href="{{ route('maintenance.index') }}" class="nav-link {{ request()->routeIs('maintenance.*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-wrench"></i>
                            <p>Maintenance</p>
                        </a>
                    </li>

                    @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    @endif

                    <!-- Reports -->
                    <li class="nav-item has-treeview {{ request()->routeIs('reports.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-chart-bar"></i>
                            <p>
                                Reports
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('reports.inventory') }}" class="nav-link {{ request()->routeIs('reports.inventory') ? 'active' : '' }}">
                                    <i class="fa fa-warehouse nav-icon"></i>
                                    <p>Inventory</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reports.assigned') }}" class="nav-link {{ request()->routeIs('reports.assigned') ? 'active' : '' }}">
                                    <i class="fa fa-user-check nav-icon"></i>
                                    <p>Assigned Assets</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reports.maintenance') }}" class="nav-link {{ request()->routeIs('reports.maintenance') ? 'active' : '' }}">
                                    <i class="fa fa-tools nav-icon"></i>
                                    <p>Maintenance Cost</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reports.retired') }}" class="nav-link {{ request()->routeIs('reports.retired') ? 'active' : '' }}">
                                    <i class="fa fa-archive nav-icon"></i>
                                    <p>Retired Assets</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reports.warranty') }}" class="nav-link {{ request()->routeIs('reports.warranty') ? 'active' : '' }}">
                                    <i class="fa fa-shield-alt nav-icon"></i>
                                    <p>Warranty</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Account -->
                    <li class="nav-header">ACCOUNT</li>
                    <li class="nav-item">
                        <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-edit"></i>
                            <p>Edit My Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- End Sidebar -->

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021
            <a href="{{ url('/dashboard') }}">Asset Management System</a>.
        </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Footer</b>
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- Scripts -->
<script src="{{ asset('asset-management-system/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script> $.widget.bridge('uibutton', $.ui.button) </script>
<script src="{{ asset('asset-management-system/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('asset-management-system/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('asset-management-system/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('asset-management-system/dist/js/demo.js') }}"></script>
<script src="{{ asset('asset-management-system/dist/js/pages/dashboard.js') }}"></script>

</body>
</html>

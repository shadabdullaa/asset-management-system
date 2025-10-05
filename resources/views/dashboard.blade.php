@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- Panel 1: Assets -->
                <div class="col-lg-3 col-6">
                    <a href="{{ route('assets.index') }}" class="text-decoration-none">
                        <div class="small-box bg-blue clickable-box">
                            <div class="inner text-white">
                                <h3>{{ $totalAssets }}</h3>
                                <p>Total Assets</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-boxes"></i>
                            </div>
                            <div class="small-box-footer text-white">View Assets</div>
                        </div>
                    </a>
                </div>

                <!-- Panel 2: Categories -->
                <div class="col-lg-3 col-6">
                    <a href="{{ route('categories.index') }}" class="text-decoration-none">
                        <div class="small-box bg-success clickable-box">
                            <div class="inner text-white">
                                <h3>{{ $totalCategories }}</h3>
                                <p>Total Categories</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-tags"></i>
                            </div>
                            <div class="small-box-footer text-white">View Categories</div>
                        </div>
                    </a>
                </div>

                <!-- Panel 3: Departments -->
                <div class="col-lg-3 col-6">
                    <a href="{{ route('departments.index') }}" class="text-decoration-none">
                        <div class="small-box bg-cyan clickable-box">
                            <div class="inner text-white">
                                <h3>{{ $totalDepartments }}</h3>
                                <p>Total Departments</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-sitemap"></i>
                            </div>
                            <div class="small-box-footer text-white">View Departments</div>
                        </div>
                    </a>
                </div>

                <!-- Panel 4: Floors -->
                <div class="col-lg-3 col-6">
                    <a href="{{ route('floors.index') }}" class="text-decoration-none">
                        <div class="small-box bg-danger clickable-box">
                            <div class="inner text-white">
                                <h3>{{ $totalFloors }}</h3>
                                <p>Total Floors</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-building"></i>
                            </div>
                            <div class="small-box-footer text-white">View Floors</div>
                        </div>
                    </a>
                </div>

            </div>
            <!-- End Small boxes (Stat box) -->

        </div>
    </section>

    <style>
        /* Make the whole small box clickable */
        .clickable-box {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .clickable-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        /* Remove underline from clickable area */
        a.text-decoration-none:hover {
            text-decoration: none;
        }

        /* Ensure text contrast is readable */
        .clickable-box .inner p,
        .clickable-box .inner h3,
        .clickable-box .small-box-footer {
            color: #fff !important;
        }
    </style>
@endsection

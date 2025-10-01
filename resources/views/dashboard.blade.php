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

                <!-- start col panel 1  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>{{ $totalAssets }}</h3>
                            <p>Total Assets</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- end col panel 1 -->

                <!-- start col panel 2  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalCategories }}<sup style="font-size: 20px"></sup></h3>
                            <p>Total Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-people-arrows"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- end col panel 2 -->

                <!-- start col panel 3  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            <h3>{{ $totalDepartments }}<sup style="font-size: 20px"></sup></h3>
                            <p>Total Departments</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- end col panel 3 -->

                <!-- start col panel 4  -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalFloors }}<sup style="font-size: 20px"></sup></h3>
                            <p>Total Floors</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- end col panel 4 -->

            </div>
            <!-- End Small boxes (Stat box) -->

        </div>
    </section>
    <!-- End main content -->
@endsection

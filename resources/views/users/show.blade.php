@extends('layouts.app')

@section('content')
    <style>
        .img-circle {
            border-radius: 50% !important;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 3px solid #adb5bd; /* optional subtle border */
        }

        @media (max-width: 576px) {
            .img-circle {
                width: 100px;
                height: 100px;
            }
        }
    </style>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('asset-management-system/dist/img/avatar.jpg') }}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Role</b> <a class="float-right">{{ ucfirst($user->role) }}</a>
                                </li>
                            </ul>

                            @if(Auth::user()->role == 'admin')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-block">
                                    <b>Edit Profile</b>
                                </a>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

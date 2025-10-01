@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pageTitle ?? 'Page' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $pageTitle ?? 'Page' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Header (Page header) -->

    <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <h3>Coming Soon!</h3>
                            <p>This page is under construction.</p>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection

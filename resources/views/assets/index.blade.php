@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assets</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Assets</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

<div class="container">
    <a href="{{ route('assets.create') }}" class="btn btn-primary mb-3">Add New Asset</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Asset Name</th>
                <th>Category</th>
                <th>Department</th>
                <th>Serial Number</th>
                <th>Status</th>
                <th>Condition</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->id }}</td>
                <td>{{ $asset->asset_name }}</td>
                <td>{{ $asset->category->name }}</td>
                <td>{{ $asset->department->department_name }}</td>
                <td>{{ $asset->serial_number }}</td>
                <td>{{ $asset->status }}</td>
                <td>{{ $asset->condition }}</td>
                <td>
                    <a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('assets.destroy', $asset->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

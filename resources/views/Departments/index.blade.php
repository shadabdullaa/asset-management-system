@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Departments</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Departments</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Content Header (Page header) -->

<div class="container">
    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add New Department</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
                <th>Floor</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $dept)
            <tr>
                <td>{{ $dept->id }}</td>
                <td>{{ $dept->department_name }}</td>
                <td>{{ $dept->floor->floor_name }}</td>
                <td>{{ $dept->description }}</td>
                <td>
                    <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('departments.destroy', $dept->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Floors</h1>
    <a href="{{ route('floors.create') }}" class="btn btn-primary mb-3">Add New Floor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Floor Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($floors as $floor)
            <tr>
                <td>{{ $floor->id }}</td>
                <td>{{ $floor->floor_name }}</td>
                <td>{{ $floor->description }}</td>
                <td>
                    <a href="{{ route('floors.edit', $floor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('floors.destroy', $floor->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

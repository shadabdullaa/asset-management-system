@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Maintenance Logs</h1>
    <a href="{{ route('maintenance.create') }}" class="btn btn-primary mb-3">Add New Log</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Asset</th>
                <th>Date</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Performed By</th>
                <th>Next Due</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->asset->asset_name }}</td>
                <td>{{ $log->maintenance_date }}</td>
                <td>{{ $log->description }}</td>
                <td>{{ $log->cost }}</td>
                <td>{{ $log->performed_by }}</td>
                <td>{{ $log->next_due }}</td>
                <td>
                    <a href="{{ route('maintenance.edit', $log->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('maintenance.destroy', $log->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

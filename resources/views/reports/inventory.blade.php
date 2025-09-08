@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asset Inventory Report</h1>
    
    @include('reports.partials.filters', [
        'route' => route('reports.inventory'),
        'floors' => $floors,
        'departments' => $departments,
        'categories' => $categories
    ])

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asset Name</th>
                <th>Department</th>
                <th>Floor</th>
                <th>Status</th>
                <th>Condition</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->asset_name }}</td>
                <td>{{ $asset->department->department_name }}</td>
                <td>{{ $asset->department->floor->floor_name ?? 'N/A' }}</td>
                <td>{{ ucfirst($asset->status) }}</td>
                <td>{{ ucfirst($asset->condition) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

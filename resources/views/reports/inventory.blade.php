@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Asset Inventory Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Asset Inventory Report</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Content Header (Page header) -->

<div class="container">
    @include('reports.partials.filters', [
        'route' => route('reports.inventory'),
        'floors' => $floors,
        'departments' => $departments,
        'categories' => $categories
    ])

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('reports.inventory') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by asset name..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-right">
            <button onclick="window.print();" class="btn btn-primary">Print Report</button>
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>Asset Name</th>
                <th>Department</th>
                <th>Floor</th>
                <th>Status</th>
                <th>Condition</th>
            </tr>
        </thead>
        <tbody class="table-light">
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

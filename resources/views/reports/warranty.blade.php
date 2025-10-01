@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Warranty Expiry Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Warranty Report</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Content Header (Page header) -->

<div class="container">

    @include('reports.partials.filters', ['route' => route('reports.warranty')])

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asset Name</th>
                <th>Category</th>
                <th>Department</th>
                <th>Floor</th>
                <th>Purchase Date</th>
                <th>Warranty Expiry</th>
                <th>Days Until Expiry</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->asset_name }}</td>
                <td>{{ $asset->category->name }}</td>
                <td>{{ $asset->department->department_name }}</td>
                <td>{{ $asset->department->floor->floor_name ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($asset->purchase_date)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($asset->warranty_expiry)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($asset->warranty_expiry)->diffInDays(\Carbon\Carbon::now(), false) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

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

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('reports.warranty') }}" method="GET">
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
                <th>Category</th>
                <th>Department</th>
                <th>Floor</th>
                <th>Purchase Date</th>
                <th>Warranty Expiry</th>
                <th>Days Until Expiry</th>
            </tr>
        </thead>
        <tbody class="table-light">
            @foreach($assets as $asset)
            @php
                $warrantyExpiry = \Carbon\Carbon::parse($asset->warranty_expiry);
                $now = \Carbon\Carbon::now();
                $isExpired = $warrantyExpiry->isPast();
                $daysLeft = $now->diffInDays($warrantyExpiry, false);
            @endphp
            <tr>
                <td>{{ $asset->asset_name }}</td>
                <td>{{ $asset->category->name }}</td>
                <td>{{ $asset->department->department_name }}</td>
                <td>{{ $asset->department->floor->floor_name ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($asset->purchase_date)->format('Y-m-d') }}</td>
                <td>{{ $warrantyExpiry->format('Y-m-d') }}</td>
                <td>
                    @if($isExpired)
                        <span class="badge bg-danger">Expired</span>
                    @else
                        {{ $daysLeft }} days
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
 
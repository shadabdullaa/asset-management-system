@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Warranty Expiry Report</h1>

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
                <td>{{ $asset->department->floor->name ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($asset->purchase_date)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($asset->warranty_expiry)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($asset->warranty_expiry)->diffInDays(\Carbon\Carbon::now(), false) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

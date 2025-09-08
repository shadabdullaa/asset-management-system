@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Retired Assets Report</h1>

    @include('reports.partials.filters', ['route' => route('reports.retired')])

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asset Name</th>
                <th>Category</th>
                <th>Department</th>
                <th>Floor</th>
                <th>Retirement Date</th>
                <th>Reason for Retirement</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->asset_name }}</td>
                <td>{{ $asset->category->name }}</td>
                <td>{{ $asset->department->department_name }}</td>
                <td>{{ $asset->department->floor->name ?? 'N/A' }}</td>
                <td>{{ $asset->retirement_date ? \Carbon\Carbon::parse($asset->retirement_date)->format('Y-m-d') : 'N/A' }}</td>
                <td>{{ $asset->retirement_reason }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Maintenance Cost Report</h1>
    
    @include('reports.partials.filters', [
        'route' => route('reports.maintenance'),
        'floors' => $floors,
        'departments' => $departments,
        'categories' => $categories
    ])

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asset Name</th>
                <th>Department</th>
                <th>Total Maintenance Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach($costs as $cost)
                @if($cost->asset)
                <tr>
                    <td>{{ $cost->asset->asset_name }}</td>
                    <td>{{ $cost->asset->department->department_name ?? 'N/A' }}</td>
                    <td>{{ number_format($cost->total_cost, 2) }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection

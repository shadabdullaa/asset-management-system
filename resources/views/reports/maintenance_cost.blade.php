@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Maintenance Cost Report</h1>
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
            <tr>
                <td>{{ $cost->asset->asset_name }}</td>
                <td>{{ $cost->asset->department->department_name }}</td>
                <td>{{ $cost->total_cost }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

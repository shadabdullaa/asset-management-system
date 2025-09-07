@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asset Inventory</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asset Name</th>
                <th>Category</th>
                <th>Department</th>
                <th>Floor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->asset_name }}</td>
                <td>{{ $asset->category->name }}</td>
                <td>{{ $asset->department->department_name }}</td>
                <td>{{ $asset->department->floor->floor_name }}</td>
                <td>{{ $asset->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

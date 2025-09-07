@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Assets with Warranty Expiring Soon</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asset Name</th>
                <th>Serial Number</th>
                <th>Department</th>
                <th>Warranty Expiry</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->asset_name }}</td>
                <td>{{ $asset->serial_number }}</td>
                <td>{{ $asset->department->department_name }}</td>
                <td>{{ $asset->warranty_expiry }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

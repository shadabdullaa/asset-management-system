@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Retired Assets</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asset Name</th>
                <th>Serial Number</th>
                <th>Department</th>
                <th>Retired Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->asset_name }}</td>
                <td>{{ $asset->serial_number }}</td>
                <td>{{ $asset->department->department_name }}</td>
                <td>{{ $asset->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

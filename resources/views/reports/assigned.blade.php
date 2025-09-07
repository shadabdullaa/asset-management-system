@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Assigned Assets</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asset Name</th>
                <th>With Whom</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->asset_name }}</td>
                <td>{{ $asset->with_whom }}</td>
                <td>{{ $asset->department->department_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

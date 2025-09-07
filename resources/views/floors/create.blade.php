@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Floor</h1>

    <form action="{{ route('floors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Floor Name</label>
            <input type="text" name="floor_name" class="form-control" required maxlength="50">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Floor</button>
    </form>
</div>
@endsection

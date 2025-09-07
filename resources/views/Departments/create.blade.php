@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Department</h1>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Floor</label>
            <select name="floor_id" class="form-control" required>
                <option value="">Select Floor</option>
                @foreach($floors as $floor)
                    <option value="{{ $floor->id }}">{{ $floor->floor_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Department Name</label>
            <input type="text" name="department_name" class="form-control" required maxlength="100">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Department</button>
    </form>
</div>
@endsection

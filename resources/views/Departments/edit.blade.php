@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Department</h1>

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Floor</label>
            <select name="floor_id" class="form-control" required>
                @foreach($floors as $floor)
                    <option value="{{ $floor->id }}" {{ $department->floor_id == $floor->id ? 'selected' : '' }}>{{ $floor->floor_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Department Name</label>
            <input type="text" name="department_name" class="form-control" value="{{ $department->department_name }}" required maxlength="100">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $department->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Department</button>
    </form>
</div>
@endsection

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
            <input type="text" name="department_name" class="form-control" required maxlength="100" style="padding: 0.5rem;">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" style="padding: 0.5rem;"></textarea>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success d-flex align-items-center">
                <i class="fas fa-save me-2"></i>
                <span>Add Department</span>
            </button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary d-flex align-items-center">
                <i class="fas fa-times me-2"></i>
                <span>Cancel</span>
            </a>
        </div>
    </form>
</div>
@endsection

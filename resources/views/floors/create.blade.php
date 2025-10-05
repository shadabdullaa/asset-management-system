@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Floor</h1>

    <form action="{{ route('floors.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Floor Name</label>
            <input type="text" name="floor_name" class="form-control" required maxlength="50" style="padding: 0.5rem;">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" style="padding: 0.5rem;"></textarea>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success d-flex align-items-center">
                <i class="fas fa-save me-2"></i>
                <span>Add Floor</span>
            </button>
            <a href="{{ route('floors.index') }}" class="btn btn-secondary d-flex align-items-center">
                <i class="fas fa-times me-2"></i>
                <span>Cancel</span>
            </a>
        </div>
    </form>
</div>
@endsection

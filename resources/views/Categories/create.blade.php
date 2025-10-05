@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control" required maxlength="100" style="padding: 0.5rem;">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" style="padding: 0.5rem;"></textarea>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-2"></i>Add Category
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection

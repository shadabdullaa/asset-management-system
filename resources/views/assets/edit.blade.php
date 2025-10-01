@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Asset</h1>

    <form action="{{ route('assets.update', $asset->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Asset Name</label>
            <input type="text" name="asset_name" class="form-control" value="{{ $asset->asset_name }}" required maxlength="150">
        </div>

    <div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $asset->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $asset->department_id == $department->id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Manufacturer</label>
            <input type="text" name="manufacturer" class="form-control" value="{{ $asset->manufacturer }}">
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control" value="{{ $asset->model }}">
        </div>

        <div class="mb-3">
            <label>Serial Number</label>
            <input type="text" name="serial_number" class="form-control" value="{{ $asset->serial_number }}" required maxlength="100">
        </div>

        <div class="mb-3">
            <label>Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" value="{{ $asset->purchase_date }}">
        </div>

        <div class="mb-3">
            <label>Warranty Expiry</label>
            <input type="date" name="warranty_expiry" class="form-control" value="{{ $asset->warranty_expiry }}">
        </div>

        <div class="mb-3">
            <label>Cost</label>
            <input type="number" step="0.01" name="cost" class="form-control" value="{{ $asset->cost }}">
        </div>

        <div class="mb-3">
            <label>Condition</label>
            <select name="condition" class="form-control" required>
                <option value="new" {{ $asset->condition=='new'?'selected':'' }}>New</option>
                <option value="good" {{ $asset->condition=='good'?'selected':'' }}>Good</option>
                <option value="fair" {{ $asset->condition=='fair'?'selected':'' }}>Fair</option>
                <option value="poor" {{ $asset->condition=='poor'?'selected':'' }}>Poor</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $asset->status=='active'?'selected':'' }}>Active</option>
                <option value="in_use" {{ $asset->status=='in_use'?'selected':'' }}>In Use</option>
                <option value="maintenance" {{ $asset->status=='maintenance'?'selected':'' }}>Maintenance</option>
                <option value="retired" {{ $asset->status=='retired'?'selected':'' }}>Retired</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="{{ $asset->location }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $asset->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>With Whom</label>
            <input type="text" name="with_whom" class="form-control" value="{{ $asset->with_whom }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Asset</button>
        <a href="{{ route('assets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

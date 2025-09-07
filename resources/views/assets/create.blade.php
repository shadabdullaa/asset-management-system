@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Asset</h1>

    <form action="{{ route('assets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Asset Name</label>
            <input type="text" name="asset_name" class="form-control" required maxlength="150">
        </div>
<div class="mb-3">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control" required>
        <option value="">--Select Category--</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control" required>
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Manufacturer</label>
            <input type="text" name="manufacturer" class="form-control" maxlength="100">
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control" maxlength="100">
        </div>

        <div class="mb-3">
            <label>Serial Number</label>
            <input type="text" name="serial_number" class="form-control" required maxlength="100">
        </div>

        <div class="mb-3">
            <label>Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Warranty Expiry</label>
            <input type="date" name="warranty_expiry" class="form-control">
        </div>

        <div class="mb-3">
            <label>Cost</label>
            <input type="number" step="0.01" name="cost" class="form-control">
        </div>

        <div class="mb-3">
            <label>Condition</label>
            <select name="condition" class="form-control" required>
                <option value="new">New</option>
                <option value="good">Good</option>
                <option value="fair">Fair</option>
                <option value="poor">Poor</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="in_use">In Use</option>
                <option value="maintenance">Maintenance</option>
                <option value="retired">Retired</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" maxlength="150">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>With Whom</label>
            <input type="text" name="with_whom" class="form-control" maxlength="150">
        </div>

        <button type="submit" class="btn btn-success">Add Asset</button>
    </form>
</div>
@endsection

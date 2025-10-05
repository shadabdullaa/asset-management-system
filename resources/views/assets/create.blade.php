@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Asset</h1>

    <form action="{{ route('assets.store') }}" method="POST">
        @csrf

        <div class="two-column-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="mb-3">
                <label>Asset Name</label>
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-tag" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="text" name="asset_name" class="form-control" required maxlength="150" style="padding-left:2.5rem;">
                </div>
            </div>

            <div class="mb-3">
                <label for="category_id">Category</label>
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-layer-group" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <select name="category_id" id="category_id" class="form-control" required style="padding-left:2.5rem;">
                        <option value="">--Select Category--</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="department_id">Department</label>
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-building" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <select name="department_id" id="department_id" class="form-control" required style="padding-left:2.5rem;">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label>Manufacturer</label>
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-industry" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="text" name="manufacturer" class="form-control" maxlength="100" style="padding-left:2.5rem;">
                </div>
            </div>

            <div class="mb-3">
                <label>Model</label>
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-cube" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="text" name="model" class="form-control" maxlength="100" style="padding-left:2.5rem;">
                </div>
            </div>

            <div class="mb-3">
                <label>Serial Number</label>
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-barcode" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="text" name="serial_number" class="form-control" required maxlength="100" style="padding-left:2.5rem;">
                </div>
            </div>

            <div class="mb-3">
                <label>Purchase Date</label>
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-shopping-cart" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="date" name="purchase_date" class="form-control" style="padding-left:2.5rem;">
                </div>
            </div>

            <div class="mb-3">
                <label>Warranty Expiry</label>
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-calendar-times" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="date" name="warranty_expiry" class="form-control" style="padding-left:2.5rem;">
                </div>
            </div>

            <div class="mb-3">
                <label>Cost</label>
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-dollar-sign" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="number" step="0.01" name="cost" class="form-control" style="padding-left:2.5rem;">
                </div>
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
                <div class="input-group-icon" style="position: relative;">
                    <i class="fas fa-map-marker-alt" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="text" name="location" class="form-control" maxlength="150" style="padding-left:2.5rem;">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>With Whom</label>
            <div class="input-group-icon" style="position: relative;">
                <i class="fas fa-user" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                <input type="text" name="with_whom" class="form-control" maxlength="150" style="padding-left:2.5rem;">
            </div>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>Add Asset
        </button>
        <a href="{{ route('assets.index') }}" class="btn btn-secondary">
            <i class="fas fa-times me-2"></i>Cancel
        </a>
    </form>
</div>

<style>
    @media (max-width: 768px) {
        .two-column-layout {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

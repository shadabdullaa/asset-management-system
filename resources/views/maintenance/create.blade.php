@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Maintenance Log</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('maintenance.store') }}" method="POST">
        @csrf

        <div class="form-row-compact" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="mb-3">
                <label for="asset_id">Asset</label>
                <div class="input-icon-wrapper" style="position: relative;">
                    <i class="fas fa-cogs" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <select name="asset_id" id="asset_id" class="form-control" required style="padding-left:2.5rem;">
                        <option value="">Select Asset</option>
                        @foreach($assets as $asset)
                            <option value="{{ $asset->id }}">{{ $asset->asset_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="maintenance_date">Maintenance Date</label>
                <div class="input-icon-wrapper" style="position: relative;">
                    <i class="fas fa-calendar-alt" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="date" name="maintenance_date" id="maintenance_date" class="form-control" required style="padding-left:2.5rem;">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" style="padding:0.5rem;" required></textarea>
        </div>

        <div class="form-row-compact" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="mb-3">
                <label for="cost">Cost</label>
                <div class="input-icon-wrapper" style="position: relative;">
                    <i class="fas fa-dollar-sign" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="number" step="0.01" name="cost" id="cost" class="form-control" required style="padding-left:2.5rem;">
                </div>
            </div>

            <div class="mb-3">
                <label for="performed_by">Performed By</label>
                <div class="input-icon-wrapper" style="position: relative;">
                    <i class="fas fa-user-check" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                    <input type="text" name="performed_by" id="performed_by" class="form-control" required style="padding-left:2.5rem;">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="next_due">Next Due Date</label>
            <div class="input-icon-wrapper" style="position: relative;">
                <i class="fas fa-calendar-check" style="position:absolute; left:0.75rem; top:50%; transform:translateY(-50%); color:#6c757d; z-index:5;"></i>
                <input type="date" name="next_due" id="next_due" class="form-control" style="padding-left:2.5rem;">
            </div>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success d-flex align-items-center">
                <i class="fas fa-save me-2"></i>
                <span>Save Maintenance Log</span>
            </button>
            <a href="{{ route('maintenance.index') }}" class="btn btn-secondary d-flex align-items-center">
                <i class="fas fa-times me-2"></i>
                <span>Cancel</span>
            </a>
        </div>
    </form>
</div>

<style>
    @media (max-width: 768px) {
        .form-row-compact {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endsection

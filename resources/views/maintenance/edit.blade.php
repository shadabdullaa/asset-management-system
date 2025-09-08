@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Maintenance Log</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('maintenance.update', $log->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="asset_id">Asset</label>
            <select name="asset_id" id="asset_id" class="form-control" required>
                <option value="">Select Asset</option>
                @foreach($assets as $asset)
                    <option value="{{ $asset->id }}" {{ $log->asset_id == $asset->id ? 'selected' : '' }}>
                        {{ $asset->asset_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="maintenance_date">Maintenance Date</label>
            <input type="date" name="maintenance_date" id="maintenance_date" class="form-control" 
                   value="{{ $log->maintenance_date }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $log->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="cost">Cost</label>
            <input type="number" step="0.01" name="cost" id="cost" class="form-control" 
                   value="{{ $log->cost }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="performed_by">Performed By</label>
            <input type="text" name="performed_by" id="performed_by" class="form-control" 
                   value="{{ $log->performed_by }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="next_due">Next Due Date</label>
            <input type="date" name="next_due" id="next_due" class="form-control" 
                   value="{{ $log->next_due }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Maintenance Log</button>
        <a href="{{ route('maintenance.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

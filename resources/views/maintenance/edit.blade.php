@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Maintenance Log</h1>

    <form action="{{ route('maintenance.update', $log->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Asset</label>
            <select name="asset_id" class="form-control" required>
                @foreach($assets as $asset)
                    <option value="{{ $asset->id }}" {{ $log->asset_id == $asset->id ? 'selected' : '' }}>{{ $asset->asset_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Maintenance Date</label>
            <input type="date" name="maintenance_date" class="form-control" value="{{ $log->maintenance_date }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $log->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Cost</label>
            <input type="number" step="0.01" name="cost" class="form-control" value="{{ $log->cost }}">
        </div>

        <div class="mb-3">
            <label>Performed By</label>
            <input type="text" name="performed_by" class="form-control" value="{{ $log->performed_by }}" maxlength="100">
        </div>

        <div class="mb-3">
            <label>Next Due Date</label>
            <input type="date" name="next_due" class="form-control" value="{{ $log->next_due }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Log</button>
    </form>
</div>
@endsection

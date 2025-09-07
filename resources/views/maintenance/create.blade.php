@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Maintenance Log</h1>

    <form action="{{ route('maintenance.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Asset</label>
            <select name="asset_id" class="form-control" required>
                <option value="">Select Asset</option>
                @foreach($assets as $asset)
                    <option value="{{ $asset->id }}">{{ $asset->asset_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Maintenance Date</label>
            <input type="date" name="maintenance_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Cost</label>
            <input type="number" step="0.01" name="cost" class="form-control">
        </div>

        <div class="mb-3">
            <label>Performed By</label>
            <input type="text" name="performed_by" class="form-control"

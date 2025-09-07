@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Floor</h1>

    <form action="{{ route('floors.update', $floor->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Floor Name</label>
            <input type="text" name="floor_name" class="form-control" value="{{ $floor->floor_name }}" required maxlength="50">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $floor->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Floor</button>
    </form>
</div>
@endsection

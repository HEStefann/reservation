@extends('layouts.admin')
@section('content')
{{-- Create restaurant --}}
<h1>Create Restaurant</h1>
<form action="{{ route('admin.restaurants.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="mb-3">
        <label for="available_people" class="form-label">Available People</label>
        <input type="number" class="form-control" id="available_people" name="available_people">
    </div>
    <div class="mb-3">
        <label for="operating_status" class="form-label">Operating Status</label>
        <select id="operating_status" name="operating_status">
            <option value="open">Open</option>
            <option value="closed">Close</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create Restaurant</button>
</form>
@endsection

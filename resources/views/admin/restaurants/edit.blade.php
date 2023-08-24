@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Edit Restaurant</h1>
        {{-- if error or success display them --}}
        <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="POST">
            @method('PUT')
            @csrf
            {{-- Title	Description	Rating	Created At	Updated At	Available People	Operating Status	Lat	Lng	Actions --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $restaurant->title }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $restaurant->description }}</textarea>
            </div>
            {{-- Rating	Created At	Updated At	Available People	Operating Status	Lat	Lng --}}
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" class="form-control" id="rating" name="rating" value="{{ $restaurant->rating }}">
            </div>
            <div class="mb-3">
                <label for="available_people" class="form-label">Available People</label>
                <input type="number" class="form-control" id="available_people" name="available_people"
                    value="{{ $restaurant->available_people }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address"
                    value="{{ $restaurant->address }}">
            </div>
            <div class="mb-3">
                @foreach ($restaurant->reviews as $review)
                    <label for="name" class="form-label">Nae</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $review->user->name }}">
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update Restaurant</button>
        </form>
    </div>
@endsection

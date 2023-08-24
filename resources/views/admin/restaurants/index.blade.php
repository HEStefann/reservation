@extends('layouts.admin')
@section('content')
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <h1>Restaurants</h1>
    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary mb-3">Create Restaurant</a>
    {{-- Using tailwind make good table but with divs not with table --}}
    <div class="overflow-x-auto">
        {{-- add 1px border solid black to the table --}}
        <div class="inline-block min-w-full rounded-lg overflow-hidden">

            <table class="table w-full text-center">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Rating</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Available People</th>
                        <th>Operating Status</th>
                        <th>Lat</th>
                        <th>Lng</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurants as $restaurant)
                        <tr>
                            <td>{{ $restaurant->title }}</td>
                            <td>{{ $restaurant->description }}</td>
                            <td class="items-center">
                                <div>
                                    {!! $restaurant->rating
                                        ? str_repeat('<i class="fas fa-star"></i>', $restaurant->rating)
                                        : str_repeat('<i class="far fa-star"></i>', 5) !!}
                                </div>
                                {{ $restaurant->rating ? $restaurant->rating : '' }}
                            </td>
                            <td>{{ $restaurant->created_at->format('Y-m-d') }}</td>
                            <td>{{ $restaurant->updated_at->format('Y-m-d') }}</td>
                            <td>{{ $restaurant->available_people }}</td>
                            <td>{{ $restaurant->operating_status }}</td>
                            <td>{{ $restaurant->lat }}</td>
                            <td>{{ $restaurant->lng }}</td>
                            <td>
                                <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" class="p-1 mb-1 text-white rounded-lg bg-blue-50 dark:bg-blue-800 dark:text-white">View</a>
                                <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}"
                                    class="p-1 mb-1 text-white rounded-lg bg-dark-50 dark:bg-blue-800 dark:text-white">Edit</a>
                                <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 mb-1 text-white rounded-lg bg-blue-50 dark:bg-red-800 dark:text-white">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

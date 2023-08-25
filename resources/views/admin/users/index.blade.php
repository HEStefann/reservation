@extends('layouts.admin')
@section('content')
    <h3>All Users</h3>
    <table class="table table-striped text-center w-full">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="rounded-full bg-blue-500 px-4">Edit</a>
                        <a href="{{ route('admin.users.destroy', $user->id) }}"
                            class="rounded-full bg-red-500 px-4">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

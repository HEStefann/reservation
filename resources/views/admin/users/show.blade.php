@extends('layouts.admin')
@section('content')
<h3>Show User</h3>
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Role: {{ $user->role }}</p>
    </div>
</div>

@endsection

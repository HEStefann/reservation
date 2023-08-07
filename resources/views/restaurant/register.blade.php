@extends('layouts.restaurant')

@section('title', 'Register')

@section('content')
    <x-auth-box action="{{ route('register') }}">

    </x-auth-box>
@endsection
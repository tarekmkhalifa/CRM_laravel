@extends('Admin.app')
@section('title', 'Login')
@section('styles')
<style>
    main {
        margin-left: 30% !important;
        margin-top: 5% !important;
    }
</style>
@endsection
@section('content')
<div class="w-50">
    <h1 class="text-center text-success mb-3">Login</h1>
    @include('Admin.errors')
        <form method="POST" action="{{route('auth.handleLogin')}}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-outline-success">Login</button>
        </form>
    </div>
@endsection
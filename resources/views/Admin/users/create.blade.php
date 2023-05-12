@extends('Admin.app')
@section('title', 'New User')
@section('content')

    <h1 class="my-3">New User</h1>
    @include('Admin.errors')
    <div class="pe-4 position-relative">
        <form method="POST" action="{{route('dashboard.users.store')}}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                <input name="name" type="text" class="form-control shadow-none" placeholder="Full name" value="{{old('name')}}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                <input name="email" type="email" class="form-control shadow-none" placeholder="Email" value="{{old('email')}}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                <input type="password" class="form-control shadow-none" name="password" placeholder="Password">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                <input type="password" class="form-control shadow-none" name="password_confirmation" placeholder="Confirm password">
            </div>


            <button type="submit" class="btn btn-outline-primary mt-2" type="button">
                Add User
            </button>
        </form>
    </div>

@endsection
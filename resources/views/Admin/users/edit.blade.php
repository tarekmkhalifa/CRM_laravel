@extends('Admin.app')
@section('title', 'Profile')
@section('content')

    <h1 class="my-3">My Profile</h1>
    @include('Admin.errors')
    <div class="pe-4 position-relative">
        <form method="POST" action="{{route('dashboard.users.update', Auth::user()->id)}}">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-person-plus-fill text-white"></i></span>
                <input name="name" type="text" class="form-control shadow-none" placeholder="Full name" value="{{$user->name}}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-envelope text-white"></i></span>
                <input name="email" type="email" class="form-control shadow-none" placeholder="Email" value="{{$user->email}}">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-key-fill text-white"></i></span>
                <input type="password" class="form-control shadow-none" name="password" placeholder="New password">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-key-fill text-white"></i></span>
                <input type="password" class="form-control shadow-none" name="password_confirmation" placeholder="Confirm password">
            </div>


            <button type="submit" class="btn btn-outline-warning mt-2" type="button">
                Update
            </button>
        </form>
    </div>

@endsection
@extends('Admin.app')
@section('title', 'New Client')
@section('content')

    <h1 class="my-3">New Client</h1>
    @include('Admin.errors')
    <div class="pe-4 position-relative">
        <form method="POST" action="{{route('dashboard.clients.store')}}" enctype="multipart/form-data">
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
                <input name="phone" type="text" class="form-control shadow-none" placeholder="Phone" value="{{old('phone')}}">
            </div>
            <label for="image" class="form-label">Image</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                <input name="image" class="form-control shadow-none" type="file" id="image">
            </div>

            <button type="submit" class="btn btn-outline-primary mt-2" type="button">
                Add client
            </button>
        </form>
    </div>

@endsection
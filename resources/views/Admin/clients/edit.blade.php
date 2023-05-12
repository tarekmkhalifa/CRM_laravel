@extends('Admin.app')
@section('title', 'Edit Client')
@section('styles')
<style>
    img {
        max-width: 150px !important;
    }
</style>
@endsection
@section('content')

    <h1 class="my-3">Edit Client</h1>

    @include('Admin.errors')
    <div class="pe-4 position-relative">
        <form method="POST" action="{{route('dashboard.clients.update', $client->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <img class="img-fluid img-thumbnail rounded" src="{{asset("uploads/images/clients/$client->image")}}" alt="">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-person-plus-fill text-white"></i></span>
                <input name="name" type="text" class="form-control shadow-none" placeholder="Full name" value="{{ $client->name }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-envelope text-white"></i></span>
                <input name="email" type="email" class="form-control shadow-none" placeholder="Email" value="{{ $client->email }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-key-fill text-white"></i></span>
                <input name="phone" type="text" class="form-control shadow-none" placeholder="Phone" value="{{ $client->phone }}">
            </div>

            <label for="image" class="form-label">Change Image</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-key-fill text-white"></i></span>
                <input name="image" class="form-control shadow-none" type="file" id="image">
            </div>

            <button type="submit" class="btn btn-outline-warning my-2" type="button">
                Update client
            </button>
        </form>
    </div>

@endsection

@extends('Admin.app')
@section('title', 'New Project')
@section('content')

    <h1 class="my-3">New Project</h1>

    @include('Admin.errors')

    <div class="pe-4 position-relative">
        <form method="POST" action="{{route('dashboard.projects.store')}}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                <input name="title" type="text" class="form-control shadow-none" placeholder="Project title" value="{{old('title')}}">
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                <textarea name="description" placeholder="Project description" class="form-control shadow-none" rows="6">{{old('description')}}</textarea>
            </div>
              
            <label for="formFile" class="form-label">Assigned user</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                <select name="user_name" class="form-select shadow-none">
                    <option selected disabled value="0">Select user</option>
                    @foreach ( $users as $user)
                    <option @if (old('user_name'))
                        selected
                    @endif value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>


            <label for="formFile" class="form-label">Assigned client</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                <select name="client_name" class="form-select shadow-none">
                    <option selected disabled value="0">Select client</option>
                    @foreach ( $clients as $client)
                    <option @if (old('client_name'))
                        selected
                    @endif value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>


            <label class="form-label">Project deadline</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                <input name="deadline" type="date" class="form-control shadow-none" value="{{old('deadline')}}">
            </div>

            <button type="submit" class="btn btn-outline-primary mt-2" type="button">
                Add
            </button>
        </form>
    </div>

@endsection

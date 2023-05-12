@extends('Admin.app')
@section('title', 'Edit Project')
@section('content')

    <h1 class="my-3">Edit Project</h1>

    @include('Admin.errors')

    <div class="pe-4 position-relative">
        <form method="POST" action="{{ route('dashboard.projects.update', $project->id) }}">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-person-plus-fill text-white"></i></span>
                <input name="title" type="text" class="form-control shadow-none" placeholder="Project title"
                    value="{{ $project->title }}">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-person-plus-fill text-white"></i></span>
                <textarea name="description" placeholder="Project description" class="form-control shadow-none" rows="6">{{ $project->description }}</textarea>
            </div>

            <label for="formFile" class="form-label">Assigned user</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-envelope text-white"></i></span>
                <select name="user_name" class="form-select shadow-none">
                    <option selected disabled value="0">Select user</option>
                    @foreach ($users as $user)
                        <option @if ($user->id == $project->user_id) selected @endif value="{{ $user->id }}">
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>


            <label for="formFile" class="form-label">Assigned client</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-envelope text-white"></i></span>
                <select name="client_name" class="form-select shadow-none">
                    <option selected disabled value="0">Select client</option>
                    @foreach ($clients as $client)
                        <option @if ($client->id == $project->client_id) selected @endif value="{{ $client->id }}">
                            {{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

            <label class="form-label">Status</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-envelope text-white"></i></span>
                <select name="status" class="form-select shadow-none">
                    <option @if ($project->status == 'Pending')
                        selected
                    @endif value="Pending">Pending</option>
                    <option 
                    @if ($project->status == 'Done')
                        selected
                    @endif
                    value="Done">Done</option>
                </select>
            </div>

            <label class="form-label">Project deadline</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-envelope text-white"></i></span>
                <input name="deadline" type="date" class="form-control shadow-none" value="{{ $project->deadline }}">
            </div>


            <button type="submit" class="btn btn-outline-warning my-2" type="button">
                Update
            </button>
        </form>
    </div>

@endsection

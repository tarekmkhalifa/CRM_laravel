@extends('Admin.app')
@section('title', 'New Task')
@section('content')

    <h1 class="my-3">New Task</h1>
    @include('Admin.errors')
    <div class="pe-4 position-relative">
        <form method="POST" action="{{ route('dashboard.tasks.store') }}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                <input name="title" type="text" class="form-control shadow-none" placeholder="task title"
                    value="{{ old('title') }}">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                <textarea name="details" placeholder="Task details" class="form-control shadow-none" rows="6">{{ old('details') }}</textarea>
            </div>

            <label for="formFile" class="form-label">Assign for project</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                <select name="project_name" class="form-select shadow-none">
                    <option selected disabled value="0">Select project</option>
                    @foreach ($projects as $project)
                        <option @if (old('project_name')) selected @endif value="{{ $project->id }}">
                            {{ $project->title }}</option>
                    @endforeach
                </select>
            </div>
            <label for="formFile" class="form-label">Task deadline</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                <input name="deadline" type="date" class="form-control shadow-none" value="{{ old('deadline') }}">
            </div>

            <button type="submit" class="btn btn-outline-primary mt-2" type="button">
                Create
            </button>
        </form>
    </div>

@endsection

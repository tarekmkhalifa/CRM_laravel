@extends('Admin.app')
@section('title', 'Edit Task')
@section('content')

    <h1 class="my-3">Edit Task</h1>
    @include('Admin.errors')
    <div class="pe-4 position-relative">
        <form method="POST" action="{{route('dashboard.tasks.update', $task->id)}}">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-person-plus-fill text-white"></i></span>
                <input name="title" type="text" class="form-control shadow-none" placeholder="task title" value="{{$task->title}}">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-person-plus-fill text-white"></i></span>
                <textarea name="details" placeholder="Task details" class="form-control shadow-none" rows="6">{{$task->details}}</textarea>
            </div>

            <label class="form-label">Assign for project</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-envelope text-white"></i></span>
                <select name="project_name" class="form-select shadow-none">
                    <option selected disabled value="0">Select project</option>
                    @foreach ( $projects as $project)
                    <option 
                    @if ($project->id == $task->project_id)
                        selected
                    @endif
                    value="{{$project->id}}">{{$project->title}}</option>
                    @endforeach
                </select>
            </div>

            <label class="form-label">Status</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-envelope text-white"></i></span>
                <select name="status" class="form-select shadow-none">
                    <option @if ($task->status == 'Pending')
                        selected
                    @endif value="Pending">Pending</option>
                    <option 
                    @if ($task->status == 'Done')
                        selected
                    @endif
                    value="Done">Done</option>
                </select>
            </div>

            <label for="formFile" class="form-label">Task deadline</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-warning"><i class="bi bi-envelope text-white"></i></span>
                <input name="deadline" type="date" class="form-control shadow-none" value="{{$task->deadline}}">
            </div>

            <button type="submit" class="btn btn-outline-warning mt-2" type="button">
                Update
            </button>
        </form>
    </div>

@endsection
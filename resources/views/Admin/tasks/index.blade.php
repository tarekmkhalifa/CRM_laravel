@extends('Admin.app')
@section('title', 'All tasks')

@section('content')
    <h1 class="my-3">All tasks</h1>
    @include('Admin.errors')
    <a class="btn btn-primary" href="{{ route('dashboard.tasks.create') }}">New task</a>
    <table class="table my-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Project</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->project->title }}</td>
                    <td>{{ $task->deadline }}</td>
                    <td
                        class="@if ($task->status == 'Done') text-success
                        @else text-warning @endif">
                        {{ $task->status }}
                    </td>
                    <td class="d-flex">
                        @if ($task->status == 'Pending')
                            <a class="h3 text-success" href="{{ route('dashboard.tasks.done', $task->id) }}"><i
                                    class="fa-sharp fa-solid fa-square-check"></i></a>
                        @endif
                        <a class="h3 mx-2 btn btn-sm btn-warning"
                            href="{{ route('dashboard.tasks.edit', $task->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form method="POST" action="{{ route('dashboard.tasks.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="h3 btn btn-sm btn-danger" type="submit">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $tasks->links() }}
    </div>


@endsection
@extends('Admin.app')
@section('title', 'All Projects')

@section('content')

    <h1 class="my-3">All Projects</h1>
    @include('Admin.errors')
    <a class="btn btn-primary" href="{{ route('dashboard.projects.create') }}">New Project</a>
    <table class="table my-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Deadline date</th>
                <th>User</th>
                <th>Client</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $project->title }}</td>
                    <td>
                        {{ $project->deadline }}
                    </td>
                    <td>{{ $project->user->name }}</td>
                    <td>{{ $project->client->name }}</td>
                    <td class="@if ($project->status == 'Done') text-success
                    @else text-warning @endif">
                        {{ $project->status }}
                    </td>
                    <td class="d-flex">
                        @if ($project->status == 'Pending')
                            <a class="h3 text-success" href="{{ route('dashboard.projects.done', $project->id) }}"><i
                                    class="fa-sharp fa-solid fa-square-check"></i></a>
                        @endif
                        <a class="h3 mx-2 btn btn-sm btn-warning"
                            href="{{ route('dashboard.projects.edit', $project->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form method="POST" action="{{ route('dashboard.projects.destroy', $project->id) }}">
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
        {{ $projects->links() }}
    </div>

@endsection
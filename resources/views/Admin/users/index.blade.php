@extends('Admin.app')
@section('title', 'All users')

@section('content')

    <h1 class="my-3">All users</h1>
    @include('Admin.errors')
    <a class="btn btn-primary" href="{{route('dashboard.users.create')}}">New User</a>

    <table class="table my-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
    
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $users->links() }}
    </div>
@endsection

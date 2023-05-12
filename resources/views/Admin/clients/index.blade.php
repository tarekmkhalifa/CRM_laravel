@extends('Admin.app')
@section('title', 'All Clients')

@section('content')

    <h1 class="my-3">All Clients</h1>
    @include('Admin.errors')
    <a class="btn btn-primary" href="{{route('dashboard.clients.create')}}">New Client</a>
    <table class="table my-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
    
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->phone}}</td>
                <td class="d-flex">
                    <a class="h3 mx-2 btn btn-sm btn-warning"
                        href="{{ route('dashboard.clients.edit', $client->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form method="POST" action="{{ route('dashboard.clients.destroy', $client->id) }}">
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
            {{ $clients->links() }}
        </div>
@endsection
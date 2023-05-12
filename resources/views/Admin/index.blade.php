@extends('Admin.app')
@section('title', 'Dashboard')
@section('content')


    <h1 class="display-4 me-5 my-3 mb-5">Dashboard</h1>

    <div class="d-flex justify-content-around">
        <div class="card text-center bg-danger" style="width: 12rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $clients }}</h5>
                <p class="card-text">Clients</p>
            </div>
        </div>
        <div class="card text-center bg-info" style="width: 12rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $projects }}</h5>
                <p class="card-text">Pending Projects</p>
            </div>
        </div>
        <div class="card text-center bg-warning" style="width: 12rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $tasks_pend }}</h5>
                <p class="card-text">Pending Tasks</p>
            </div>
        </div>
        <div class="card text-center bg-success" style="width: 12rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $tasks_compl }}</h5>
                <p class="card-text">Completed Tasks</p>
            </div>
        </div>
    </div>

@endsection
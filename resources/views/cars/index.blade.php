@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Model</th>
                            <th>Registration</th>
                            <th>Year</th>
                            <th>Class</th>
                            <th>Seats</th>
                            <th>Price</th>
                            <th>Photo</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td>
                                    <a href="{{ $car->path() }}">
                                        {{ $car->model }}
                                    </a>
                                </td>
                                <td>{{ $car->registration }}</td>
                                <td>{{ $car->year }}</td>
                                <td>{{ $car->carClass->name }}</td>
                                <td>{{ $car->seats }}</td>
                                <td>{{ $car->price }}</td>
                                <td><img src="{{ asset($car->photo) }}" style="height: 100px; width: 175px" /></td>
                                <td>{{ $car->notes }}</td>
                                <td>
                                    <form method="POST" action="{{ $car->path() }}" class="mb-2">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Del</button>
                                    </form>
                                    <a href="{{ $car->path() . '/edit' }}">
                                        <button class="btn btn-warning">Edit</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

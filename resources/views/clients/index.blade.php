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
                            <th>Name</th>
                            <th>Country</th>
                            <th>Passport</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>First Reservation</th>
                            <th>Last Reservation</th>
                            <th>Registered</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>
                                    <a href="{{ $client->path() }}">
                                        {{ $client->name }}
                                    </a>
                                </td>
                                <td>{{ $client->country->name }}</td>
                                <td>{{ $client->passport }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->first_reservation }}</td>
                                <td>{{ $client->last_reservation }}</td>
                                <td>{{ $client->registered }}</td>
                                <td>{{ $client->notes }}</td>
                                <td>
                                    <a href="{{ $client->path() . '/edit' }}">
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                    </a>
                                    <form method="POST" action="{{ $client->path() }}" class="mb-2">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Del</button>
                                    </form>
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

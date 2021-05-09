@extends('layouts.dashboard')

@section('dashboard-content')
    <section class="my-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h2>Clients</h2>
                <a href="{{ route('admin.clients.create') }}">
                    <button class="btn btn-success px-4 rounded-pill">Add New</button>
                </a>
            </div>
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Clients Table
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
                                <th>Notes</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->country->name }}</td>
                                    <td>{{ $client->passport }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->first_reservation }}</td>
                                    <td>{{ $client->last_reservation }}</td>
                                    <td>{{ $client->notes ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ $client->path() }}">Details</a>
                                            <a href="{{ $client->path() . '/edit' }}" class="mx-2">Edit</a>
                                            <form method="POST" action="{{ $client->path() }}">
                                                @method('DELETE')
                                                @csrf
                                                <button style='border: 0; background: none; padding: 0; color: red;'>Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $clients->links() }}
        </div>
    </section>
@endsection

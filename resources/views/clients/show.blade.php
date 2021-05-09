@extends('layouts.dashboard')

@section('dashboard-content')
    <section class="py-5">
        <div class="container">
            <h2>Client Details</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.clients.index') }}">Clients</a></li>
                <li class="breadcrumb-item active">{{ $client->name }}</li>
            </ol>
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-end">
                        <h3>Details</h3>
                        <div class="d-flex justify-content-between">
                            <a href="{{ $client->path() . '/edit' }}">Edit</a>
                            <form method="POST" action="{{ $client->path() }}" class="mb-2 ml-2">
                                @method('DELETE')
                                @csrf
                                <button style='border: 0; background: none; padding: 0; color: red;'>Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $client->name }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $client->country->name }}</td>
                            </tr>
                            <tr>
                                <th>Passport</th>
                                <td>{{ $client->passport }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $client->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $client->email }}</td>
                            </tr>
                            <tr>
                                <th>First Reservation</th>
                                <td>{{ $client->first_reservation }}</td>
                            </tr>
                            <tr>
                                <th>Last Reservation</th>
                                <td>{{ $client->last_reservation }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-5 offset-md-1">
                    <h3>Notes</h3>
                    <p>{{ $client->notes ?? 'No notes for this client.' }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

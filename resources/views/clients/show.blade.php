@extends('layouts.dashboard')

@section('dashboard-content')
    <section class="py-5">
        <div class="container">
            <!-- Page Heading/Breadcrumbs-->
            <h1>
                Portfolio Item
                <small>Subheading</small>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.clients.index') }}">Clients</a></li>
                <li class="breadcrumb-item active">{{ $client->name }}</li>
            </ol>
            <!-- Portfolio Item Row-->
            <div class="row">
                <div class="col-md-6">
                    <h3 class="my-3">Client Details</h3>
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
                            <tr>
                                <th>Registered</th>
                                <td>{{ $client->registered }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ $client->path() . '/edit' }}">
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ $client->path() }}" class="mb-2">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-5 offset-md-1">
                    <h3 class="my-3">Notes</h3>
                    <p>{{ $client->notes }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

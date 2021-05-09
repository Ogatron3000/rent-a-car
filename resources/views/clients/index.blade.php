@extends('layouts.dashboard')

@section('dashboard-content')
    <section class="my-5">
        <div class="container">
            <h3>Search</h3>
            <form method="GET" action="{{ route('admin.clients.index') }}">
                @csrf
                <div class="card my-3">
                    <div class="card-body row">

                        <div class="form-group mr-4">
                            <label for="name" class="text-md-right">{{ __('Name') }}</label>
                            <div>
                                <input id="name" type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="passport" class="text-md-right">{{ __('Passport') }}</label>
                            <div>
                                <input id="passport" type="text" class="form-control" name="passport">
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="email" class="text-md-right">{{ __('Email') }}</label>
                            <div>
                                <input id="email" type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="phone" class="text-md-right">{{ __('Phone') }}</label>
                            <div>
                                <input id="phone" type="text" class="form-control" name="phone">
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="country_id" class="text-md-right">{{ __('Country') }}</label>
                            <div>
                                <select id="country_id" class="form-control" name="country_id">
                                    <option value="" selected disabled>select country</option>
                                    @foreach($countries as $country)
                                        <option value={{ $country->id }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="first_reservation" class="text-md-right">{{ __('First Reservation') }}</label>
                            <div>
                                <input id="first_reservation" type="date" class="form-control" name="first_reservation">
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="last_reservation" class="text-md-right">{{ __('Last Reservation') }}</label>
                            <div>
                                <input id="last_reservation" type="date" class="form-control" name="last_reservation">
                            </div>
                        </div>

                            <div class="form-group mr-4 d-flex align-items-end ">
                                <button class="btn btn-primary">Search</button>
                            </div>
                    </div>
                </div>
            </form>
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
                                    <td>{{ $client->phone ?? '/' }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->first_reservation ?? '/' }}</td>
                                    <td>{{ $client->last_reservation ?? '/' }}</td>
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

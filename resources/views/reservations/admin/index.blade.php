@extends('layouts.dashboard')

@section('dashboard-content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h2>Reservations</h2>
                <a href="{{ route('admin.reservations.create') }}">
                    <button class="btn btn-success px-4 rounded-pill">Add New</button>
                </a>
            </div>
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Reservations Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Car</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Equipment</th>
                                <th>Price</th>
                                <th>Notes</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>
                                        <a href="{{ $reservation->client->path() }}">
                                            {{ $reservation->client->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ $reservation->car->path() }}">
                                            {{ $reservation->car->model }}
                                        </a>
                                    </td>
                                    <td>{{ $reservation->from_date }}</td>
                                    <td>{{ $reservation->to_date }}</td>
                                    <td>{{ $reservation->startLocation->name }}</td>
                                    <td>{{ $reservation->endLocation->name }}</td>
                                    <td>
                                        @if( ! $reservation->equipment->isEmpty())
                                            <ul>
                                                @foreach($reservation->equipment as $item)
                                                    <li>{{ $item->name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            /
                                        @endif
                                    </td>
                                    <td>{{ $reservation->price }}</td>
                                    <td>{{ $reservation->notes ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ $reservation->adminPath() }}">Details</a>
                                            <a href="{{ $reservation->adminPath() . '/edit' }}" class="mx-2">Edit</a>
                                            <form method="POST" action="{{ $reservation->adminPath() }}">
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
        </div>
    </section>
@endsection

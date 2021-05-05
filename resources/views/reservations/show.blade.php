@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <!-- Page Heading/Breadcrumbs-->
            <h1>
                Portfolio Item
                <small>Subheading</small>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('reservations.index') }}">Reservations</a></li>
                <li class="breadcrumb-item active">{{ $reservation->name }}</li>
            </ol>
            <!-- Portfolio Item Row-->
            <div class="row">
                <div class="col-md-6">
                    <h3 class="my-3">Reservation Details</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                            <tr>
                                <th>Client</th>
                                <td>{{ $reservation->client->name }}</td>
                            </tr>
                            <tr>
                                <th>Car</th>
                                <td>{{ $reservation->car->model }}</td>
                            </tr>
                            <tr>
                                <th>From</th>
                                <td>{{ $reservation->from_date }}</td>
                            </tr>
                            <tr>
                                <th>To</th>
                                <td>{{ $reservation->to_date }}</td>
                            </tr>
                            <tr>
                                <th>Start Location</th>
                                <td>{{ $reservation->startLocation->name }}</td>
                            </tr>
                            <tr>
                                <th>End Location</th>
                                <td>{{ $reservation->endLocation->name }}</td>
                            </tr>
                            <tr>
                                <th>Equipment</th>
                                <td>
                                    <ul>
                                        @foreach($reservation->equipment as $item)
                                            <li>{{ $item->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $reservation->price }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ $reservation->path() . '/edit' }}">
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ $reservation->path() }}" class="mb-2">
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
                    <p>{{ $reservation->notes }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

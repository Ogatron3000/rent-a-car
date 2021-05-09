@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <h2>Reservations</h2>
                <a href="{{ route('reservations.create') }}">
                    <button class="btn btn-success px-4 rounded-pill">Book!</button>
                </a>
            </div>
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Reservation History
                </div>
                @if( ! $reservations->isEmpty())
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
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
                                        <td>{{ $reservation->car->model }}</td>
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
                                            @if($reservation->from_date > \Carbon\Carbon::now()->toDateString())
                                                <div class="d-flex">
                                                    <a href="{{ $reservation->path() }}">Details</a>
                                                    <a href="{{ $reservation->path() . '/edit' }}" class="mx-2">Edit</a>
                                                    <form method="POST" action="{{ $reservation->path() }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button style='border: 0; background: none; padding: 0; color: red;'>Cancel</button>
                                                    </form>
                                                </div>
                                            @else
                                                <a href="{{ $reservation->path() }}">Details</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card-body">
                        Looks like you didn't rent from us yet. You can change that right now and
                        <a href="{{ route('reservations.create') }}" class="text-success">Book!</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @include('_partials._footer')
@endsection

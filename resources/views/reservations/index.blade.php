@extends('layouts.app')

@section('content')
    <section class="py-4">
        <div class="container">
            <h2>Reservations</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Reservations</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Reservation History
                </div>
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
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>
                                        {{ $reservation->car->model }}
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
                                    <td>
                                        @if($reservation->from_date > \Carbon\Carbon::now()->toDateString())
                                            <div class="d-flex">
                                                <a href="{{ $reservation->path() }}">Details</a>
                                                <a href="{{ $reservation->path() . '/edit' }}" class="mx-2">Edit</a>
                                                <form method="POST" action="{{ $reservation->path() }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button style='border: 0; background: none; padding: 0; color: red;'>Delete</button>
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
            </div>
        </div>
    </section>
@endsection

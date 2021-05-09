@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2>Reservation Details</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('reservations.index') }}">Reservations</a></li>
                <li class="breadcrumb-item active">{{ $reservation->created_at }}</li>
            </ol>
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-end">
                        <h3>Details</h3>
                        <div class="d-flex justify-content-between">
                            <a href="{{ $reservation->path() . '/edit' }}">Edit</a>
                            <form method="POST" action="{{ $reservation->path() }}" class="mb-2 ml-2">
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
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $reservation->price }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <h3>Notes</h3>
                    <p>{{ $reservation->notes ?? 'No notes for this reservation.' }}</p>
                </div>
            </div>
        </div>
    </section>
    @include('_partials._footer')
@endsection

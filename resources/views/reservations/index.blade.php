@extends('layouts.app')

@section('content')
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
                                    <a href="{{ $reservation->car->path() }}">
                                        {{ $reservation->car->model }}
                                    </a>
                                </td>
                                <td>{{ $reservation->from_date }}</td>
                                <td>{{ $reservation->to_date }}</td>
                                <td>{{ $reservation->startLocation->name }}</td>
                                <td>{{ $reservation->endLocation->name }}</td>
                                <td>
                                    <ul>
                                        @foreach($reservation->equipment as $item)
                                            <li>{{ $item->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $reservation->price }}</td>
                                <td>
                                    <a href="{{ $reservation->path() . '/edit' }}">
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                    </a>
                                    <form method="POST" action="{{ $reservation->path() }}" class="mb-2">
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

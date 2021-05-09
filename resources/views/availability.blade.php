@extends('layouts.dashboard')

@section('dashboard-content')
    <section class="my-5">
        <div class="container">
            <h3>Search Availability</h3>
            <form method="GET" action="{{ route('admin.availability') }}">
                @csrf
                <div class="card col-xl-8 my-3">
                    <div class="card-body">
                        <livewire:search-car :carClasses="$carClasses" />
                    </div>
                </div>
            </form>
            <h3>Available Cars</h3>
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    {{ $cars->count() }} {{ $carClass }} cars available {{ $fromDate !== "" ? " from " . $fromDate : "/" }} {{ $toDate !== "" ? " to " . $toDate : "" }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Model</th>
                                <th>Registration</th>
                                <th>Year</th>
                                <th>Class</th>
                                <th>Seats</th>
                                <th>Price</th>
                                <th>Photo</th>
                                <th>Notes</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>
                                        <a href="{{ $car->path() }}">
                                            {{ $car->model }}
                                        </a>
                                    </td>
                                    <td>{{ $car->registration }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->carClass->name }}</td>
                                    <td>{{ $car->seats }}</td>
                                    <td>{{ $car->price }}</td>
                                    <td><img src="{{ asset($car->photo) }}" style="height: 100px; width: 175px" alt="car" /></td>
                                    <td>{{ $car->notes ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ $car->path() }}">Details</a>
                                            <a href="{{ $car->path() . '/edit' }}" class="mx-2">Edit</a>
                                            <form method="POST" action="{{ $car->path() }}">
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

@extends('layouts.dashboard')

@section('dashboard-content')
    <section class="py-4">
        <div class="container-fluid">
            <h2>Car Details</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.cars.index') }}">Cars</a></li>
                <li class="breadcrumb-item active">{{ $car->model }}</li>
            </ol>
            <div class="row">
                <div class="col-md-7"><img class="img-fluid" src="{{ asset($car->photo) }}" alt="..." /></div>
                <div class="col-md-5">
                    <div class="d-flex justify-content-between align-items-end">
                        <h3>Details</h3>
                        <div class="d-flex justify-content-between">
                            <a href="{{ $car->path() . '/edit' }}">Edit</a>
                            <form method="POST" action="{{ $car->path() }}" class="mb-2 ml-2">
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
                                    <th>Model</th>
                                    <td>{{ $car->model }}</td>
                                </tr>
                                <tr>
                                    <th>Registration</th>
                                    <td>{{ $car->registration }}</td>
                                </tr>
                                <tr>
                                    <th>Year</th>
                                    <td>{{ $car->year }}</td>
                                </tr>
                                <tr>
                                    <th>Class</th>
                                    <td>{{ $car->carClass->name }}</td>
                                </tr>
                                <tr>
                                    <th>Seats</th>
                                    <td>{{ $car->seats }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $car->price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="my-3">Notes</h3>
                    <p>{{ $car->notes ?? 'No notes for this car.' }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

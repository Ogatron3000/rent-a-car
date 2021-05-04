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
                <li class="breadcrumb-item"><a href="{{ route('admin.cars.index') }}">Cars</a></li>
                <li class="breadcrumb-item active">{{ $car->model }}</li>
            </ol>
            <!-- Portfolio Item Row-->
            <div class="row">
                <div class="col-md-8"><img class="img-fluid" src="{{ asset($car->photo) }}" alt="..." /></div>
                <div class="col-md-4">
                    <h3 class="my-3">Car Details</h3>
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
                                <tr>
                                    <td>
                                        <a href="{{ $car->path() . '/edit' }}">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ $car->path() }}" class="mb-2">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="my-3">Notes</h3>
                    <p>{{ $car->notes }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

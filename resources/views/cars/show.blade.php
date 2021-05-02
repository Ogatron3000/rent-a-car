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
                <li class="breadcrumb-item"><a href="{{ route('cars.index') }}">Cars</a></li>
                <li class="breadcrumb-item active">{{ $car->model }}</li>
            </ol>
            <!-- Portfolio Item Row-->
            <div class="row">
                <div class="col-md-8"><img class="img-fluid" src="{{ asset($car->photo) }}" alt="..." /></div>
                <div class="col-md-4">
                    <h3 class="my-3">Car Details</h3>
                    <ul>
                        <li>{{ $car->model }}</li>
                        <li>{{ $car->registration }}</li>
                        <li>{{ $car->year }}</li>
                        <li>{{ $car->carClass->name }}</li>
                        <li>{{ $car->seats }}</li>
                        <li>{{ $car->price }}</li>
                    </ul>
                    <h3 class="my-3">Notes</h3>
                    <p>{{ $car->notes }}</p>
                </div>
            </div>
        </div>
    </section>
    {{--<div>{{ $car->model }}</div>--}}
    {{--<div>{{ $car->registration }}</div>--}}
    {{--<div>{{ $car->year }}</div>--}}
    {{--<div>{{ $car->carClass->name }}</div>--}}
    {{--<img src="{{ asset($car->photo) }}" style="height: 400px; width: 700px" />--}}
    {{--<div>{{ $car->seats }}</div>--}}
    {{--<div>{{ $car->price }}</div>--}}
    {{--<div>{{ $car->notes }}</div>--}}
    {{--<form method="POST" action="{{ $car->path() }}">--}}
    {{--    @method('DELETE')--}}
    {{--    @csrf--}}
    {{--    <button>del</button>--}}
    {{--</form>--}}
@endsection

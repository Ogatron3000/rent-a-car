@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <!-- Page Heading/Breadcrumbs-->
        <h1 class="mt-4 mb-3">
            Portfolio 3
            <small>Subheading</small>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Portfolio 3</li>
        </ol>
        <div class="row">
        @foreach($cars as $car)
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                   <img class="card-img-top" src="{{ asset($car->photo) }}" alt="..." />
                    <div class="card-body">
                        <h4 class="card-title">{{ $car->model }}</h4>
                        <p class="card-text">{{ $car->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <!-- Pagination-->
        {{ $cars->links() }}
        <!-- <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#!">1</a></li>
            <li class="page-item"><a class="page-link" href="#!">2</a></li>
            <li class="page-item"><a class="page-link" href="#!">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul> -->
    </div>
</section>
@include('_partials._footer')
@endsection
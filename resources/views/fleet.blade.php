@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Fleet</h2>
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
    </div>
</section>
@include('_partials._footer')
@endsection

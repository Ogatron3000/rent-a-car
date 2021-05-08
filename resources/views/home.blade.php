@extends('layouts.app')

@section('content')
<header>
    <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/carousel3.jpg') }}" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Luxury</h3>
                    <p>One of our cars, probably going over the speed limit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/carousel1.jpg') }}" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Adventure</h3>
                    <p>You wouldn't believe how much we payed this girl.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/carousel2.jpg') }}" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Um, roads?</h3>
                    <p>There wasn't a lot of decent 1600x900 car images online.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<section class="py-5">
    <div class="container">
        <h1 class="mb-5 text-center">Welcome to Brm Brm Car</h1>
        <div class="row">
            <div class="col-md-4 col-12-medium mb-4 mb-lg-0 text-center">
                <section class="first">
                    <i class="icon solid featured fas fa-map-marker-alt fa-6x mb-4"></i>
                    <header>
                        <h3>Ipsum consequat</h3>
                    </header>
                    <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
                </section>
            </div>
            <div class="col-md-4 col-12-medium mb-4 mb-lg-0 text-center">
                <section class="first">
                    <i class="icon solid featured far fa-clock fa-6x mb-4"></i>
                    <header>
                        <h3>Ipsum consequat</h3>
                    </header>
                    <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
                </section>
            </div>
            <div class="col-md-4 col-12-medium mb-4 mb-lg-0 text-center">
                <section class="first">
                    <i class="icon solid featured fas fa-euro-sign fa-6x mb-4"></i>
                    <header>
                        <h3>Ipsum consequat</h3>
                    </header>
                    <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
                </section>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">Trending Cars</h2>
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
    </div>
</section>
<aside class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p></div>
            <div class="col-md-4"><a class="btn btn-lg btn-secondary btn-block" href="{{ route('register') }}">Join Now!</a></div>
        </div>
    </div>
</aside>
<div style="position: relative;">
    @include('_partials._footer')
</div>
@endsection

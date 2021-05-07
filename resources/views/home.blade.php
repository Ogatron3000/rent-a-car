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
<!-- Page Content -->
<section class="py-5">
    <div class="container">
        <h1 class="mb-5 text-center">Welcome to Brm Brm Car</h1>
        <!-- Marketing Icons Section-->
        <div class="row">
            <div class="col-md-4 col-12-medium mb-4 mb-lg-0 text-center">
                <section class="first">
                    <i class="icon solid featured fas fa-map-marker-alt fa-8x mb-4"></i>
                    <header>
                        <h2>Ipsum consequat</h2>
                    </header>
                    <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
                </section>
            </div>
            <div class="col-md-4 col-12-medium mb-4 mb-lg-0 text-center">
                <section class="first">
                    <i class="icon solid featured far fa-clock fa-8x mb-4"></i>
                    <header>
                        <h2>Ipsum consequat</h2>
                    </header>
                    <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
                </section>
            </div>
            <div class="col-md-4 col-12-medium mb-4 mb-lg-0 text-center">
                <section class="first">
                    <i class="icon solid featured fas fa-euro-sign fa-8x mb-4"></i>
                    <header>
                        <h2>Ipsum consequat</h2>
                    </header>
                    <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
                </section>
            </div>
        </div>

    </div>
</section>
<hr class="my-0" />
<!-- Portfolio Section-->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">Chek out our fleet</h2>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                    <div class="card-body">
                        <h4 class="card-title"><a href="#!">Project One</a></h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary" href="#!">Book now!</a></div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                    <div class="card-body">
                        <h4 class="card-title"><a href="#!">Project Two</a></h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary" href="#!">Book now!</a></div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                    <div class="card-body">
                        <h4 class="card-title"><a href="#!">Project Three</a></h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary" href="#!">Book now!</a></div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                    <div class="card-body">
                        <h4 class="card-title"><a href="#!">Project Four</a></h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary" href="#!">Book now!</a></div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                    <div class="card-body">
                        <h4 class="card-title"><a href="#!">Project Five</a></h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary" href="#!">Book now!</a></div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                    <div class="card-body">
                        <h4 class="card-title"><a href="#!">Project Six</a></h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary" href="#!">Book now!</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr class="my-0" />
<!-- Call to Action-->
<aside class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p></div>
            <div class="col-md-4"><a class="btn btn-lg btn-secondary btn-block" href="#!">Call to Action</a></div>
        </div>
    </div>
</aside>
<!-- Footer-->
@include('_partials._footer')
@endsection

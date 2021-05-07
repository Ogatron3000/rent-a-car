@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <!-- Page Heading/Breadcrumbs-->
        <h1>About Our Company</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">About</li>
        </ol>
        <!-- Intro Content-->
        <div class="row">
            <div class="col-lg-6"><img class="img-fluid rounded mb-4" src="{{ asset('img/company.jpg') }}" alt="..." /></div>
            <div class="col-lg-6">
                <h2>About Brm Brm Car</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
            </div>
        </div>
    </div>
</section>
@include('_partials._footer')
@endsection
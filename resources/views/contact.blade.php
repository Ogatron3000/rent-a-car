@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Contact</h2>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <!-- Embedded Google Map-->
                <iframe style="width: 100%; height: 400px; border: 0" src="http://maps.google.com/maps?q=34.0834745,-118.2860304&z=15&output=embed"></iframe>
            </div>
            <div class="col-lg-4 mb-4">
                <h3>Contact Details</h3>
                <p>
                    3481 Melrose Place
                    <br />
                    Beverly Hills, CA 90210
                    <br />
                </p>
                <p>
                    <abbr title="Phone">P</abbr>
                    : (123) 456-7890
                </p>
                <p>
                    <abbr title="Email">E</abbr>
                    :
                    <a href="mailto:name@example.com">name@example.com</a>
                </p>
                <p>
                    <abbr title="Hours">H</abbr>
                    : Monday - Friday: 9:00 AM to 5:00 PM
                </p>
            </div>
        </div>
    </div>
</section>
@include('_partials._footer')
@endsection

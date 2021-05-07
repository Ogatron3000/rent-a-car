@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <!-- Page Heading/Breadcrumbs-->
        <h1>
            Contact
            <small>Subheading</small>
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>
        <!-- Content Row-->
        <div class="row">
            <!-- Map Column-->
            <div class="col-lg-8 mb-4">
                <!-- Embedded Google Map-->
                <iframe style="width: 100%; height: 400px; border: 0" src="http://maps.google.com/maps?q=34.0834745,-118.2860304&z=15&output=embed"></iframe>
            </div>
            <!-- Contact Details Column-->
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
        <!-- Contact Form-->
        <!-- In order to set the email address and subject line for the contact form go to the assets/mail/contact_me.php file.-->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>Send us a Message</h3>
                <form id="contactForm" name="sentMessage" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name:</label>
                            <input class="form-control" id="name" type="text" required data-validation-required-message="Please enter your name." />
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input class="form-control" id="email" type="email" required data-validation-required-message="Please enter your email address." />
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea class="form-control" id="message" rows="10" cols="100" required data-validation-required-message="Please enter your message" maxlength="999" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages-->
                    <button class="btn btn-primary" id="sendMessageButton" type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
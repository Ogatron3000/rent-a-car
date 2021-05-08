@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Reservation') }}</div>
                    
                    <form method="POST" action="{{ $reservation->path() }}">
                        @method('PUT')
                        @csrf

                        <div class="card-body">
                            <livewire:book-car-edit :reservation="$reservation" :carClasses="$carClasses" :locations="$locations" :equipment="$equipment" />
                        </div>
                        <div class="card-footer">
                            <div class="row justify-content-between">
                                <a href="{{ url()->previous() }}">
                                    <button class="btn btn-secondary" type="button">Back</button>
                                </a>
                                <button class="btn btn-primary" type="submit">Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('_partials._footer')
@endsection

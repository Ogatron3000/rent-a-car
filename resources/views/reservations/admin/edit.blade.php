@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Reservation') }}</div>

                    <form method="POST" action="{{ $reservation->adminPath() }}">
                        @method('PUT')
                        @csrf

                        <div class="card-body">
                            <div class="form-group row" wire:model="fromDate">
                                <label for="passport" class="col-md-4 col-form-label text-md-right">{{ __('Client Passport') }}</label>

                                <div class="col-md-6">
                                    <input id="passport"
                                           type="text"
                                           class="form-control @error('from_date') is-invalid @enderror"
                                           name="passport"
                                           value="{{ $reservation->client->passport }}"
                                           required>

                                    @error('passport')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <livewire:book-car-edit :reservation="$reservation" :carClasses="$carClasses" :locations="$locations" :equipment="$equipment" />
                        </div>

                        <div class="card-footer">
                            <div class="row justify-content-between">
                                <a href="{{ url()->previous() }}">
                                    <button class="btn btn-secondary" type="button">Back</button>
                                </a>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

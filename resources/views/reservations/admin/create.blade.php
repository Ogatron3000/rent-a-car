@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Reservation') }}</div>

                    <form method="POST" action="{{ route('admin.reservations.store') }}">
                        @csrf

                        <div class="card-body">
                            <div class="form-group row" wire:model="fromDate">
                                <label for="passport" class="col-md-4 col-form-label text-md-right">{{ __('Client Passport') }}</label>

                                <div class="col-md-6">
                                    <input id="from_date"
                                           type="text"
                                           class="form-control @error('from_date') is-invalid @enderror"
                                           name="passport"
                                           value="{{ old('passport') }}"
                                           required>

                                    @error('passport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <livewire:book-car :carClasses="$carClasses" :locations="$locations" :equipment="$equipment" />
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
@endsection

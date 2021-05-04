@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Reservation') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.reservations.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="client_id" class="col-md-4 col-form-label text-md-right">{{ __('Client') }}</label>

                                <div class="col-md-6">
                                    <select id="client_id" class="form-control" name="client_id" required>
                                        @foreach($clients as $client)
                                            <option {{ $client->id === old('client_id') ? 'selected' : '' }} value={{ $client->id }}>{{ $client->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car_id" class="col-md-4 col-form-label text-md-right">{{ __('Car') }}</label>

                                <div class="col-md-6">
                                    <select id="car_id" class="form-control" name="car_id" required>
                                        @foreach($cars as $car)
                                            <option {{ $car->id === old('car_id') ? 'selected' : '' }} value={{ $car->id }}>{{ $car->model }}</option>
                                        @endforeach
                                    </select>

                                    @error('car_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="from_date" class="col-md-4 col-form-label text-md-right">{{ __('From Date') }}</label>

                                <div class="col-md-6">
                                    <input id="from_date" type="date" class="form-control @error('from_date') is-invalid @enderror" name="from_date" value="{{ old('from_date') }}" required autocomplete="from_date">

                                    @error('from_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="to_date" class="col-md-4 col-form-label text-md-right">{{ __('To Date') }}</label>

                                <div class="col-md-6">
                                    <input id="to_date" type="date" class="form-control @error('to_date') is-invalid @enderror" name="to_date" value="{{ old('to_date') }}" required autocomplete="to_date">

                                    @error('to_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_location_id" class="col-md-4 col-form-label text-md-right">{{ __('Start Location') }}</label>

                                <div class="col-md-6">
                                    <select id="start_location_id" class="form-control" name="start_location_id" required>
                                        @foreach($locations as $location)
                                            <option {{ $location->id === old('start_location_id') ? 'selected' : '' }} value={{ $location->id }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('start_location_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_location_id" class="col-md-4 col-form-label text-md-right">{{ __('End Location') }}</label>

                                <div class="col-md-6">
                                    <select id="end_location_id" class="form-control" name="end_location_id" required>
                                        @foreach($locations as $location)
                                            <option {{ $location->id === old('end_location_id') ? 'selected' : '' }} value={{ $location->id }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('end_location_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="equipment_ids" class="col-md-4 col-form-label text-md-right">{{ __('Equipment') }}</label>

                                <div class="col-md-6">
                                    <select id="equipment_ids" class="form-control" name="equipment_ids[]" multiple>
                                        @foreach($equipment as $item)
                                            <option value={{ $item->id }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('equipment_ids')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="notes" class="col-md-4 col-form-label text-md-right">{{ __('Notes') }}</label>

                                <div class="col-md-6">
                                    <textarea id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes">{{ old('notes') }}</textarea>

                                    @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

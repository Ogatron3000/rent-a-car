@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Car') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                                <div class="col-md-6">
                                    <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model" autofocus>

                                    @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="registration" class="col-md-4 col-form-label text-md-right">{{ __('Registration') }}</label>

                                <div class="col-md-6">
                                    <input id="registration" type="text" class="form-control @error('registration') is-invalid @enderror" name="registration" value="{{ old('registration') }}" required autocomplete="registration">

                                    @error('registration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="year" required>
                                        @for($year = (int)date('Y'); 1900 <= $year; $year--)
                                            <option {{ $year === old('year') ? 'selected' : '' }} value={{ $year }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>

                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car_class_id" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                                <div class="col-md-6">
                                    <select id="car_class_id" class="form-control" name="car_class_id" required>
                                        @foreach($carClasses as $class)
                                            <option {{ $class->id === old('car_class_id') ? 'selected' : '' }} value={{ $class->id }}>{{ $class->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('car_class_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="seats" class="col-md-4 col-form-label text-md-right">{{ __('Seats') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="seats" required>
                                        @for($seat = 2; $seat <= 6; $seat++)
                                            <option {{ $seat === old('seat') ? 'selected' : '' }} value={{ $seat }}>
                                                {{ $seat }}
                                            </option>
                                        @endfor
                                    </select>

                                    @error('seats')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">€</div>
                                        </div>
                                        <input id="price" type="number" min="0.01" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">
                                    </div>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input id="photo" type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" required>
                                        <label class="custom-file-label" for="photo">Choose file</label>
                                    </div>

                                    @error('photo')
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

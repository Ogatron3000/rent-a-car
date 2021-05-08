@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Car') }}</div>

                    <form method="POST" action="{{ $car->path() }}" enctype="multipart/form-data">
                        <div class="card-body">
                            @method("PUT")
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6 offset-4">
                                    <img src="{{ asset($car->photo) }}" class="img-fluid rounded" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                                <div class="col-md-6">
                                    <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $car->model }}" required autofocus>

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
                                    <input id="registration" type="text" class="form-control @error('registration') is-invalid @enderror" name="registration" value="{{ $car->registration }}" required>

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
                                            <option {{ $year === $car->year ? 'selected' : '' }} value={{ $year }}>
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
                                            <option {{ $class->id === $car->car_class_id ? 'selected' : '' }} value={{ $class->id }}>{{ $class->name }}</option>
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
                                        @for($seats = 2; $seats <= 6; $seats++)
                                            <option {{ $seats === $car->seats ? 'selected' : '' }} value={{ $seats }}>
                                                {{ $seats }}
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
                                        <input id="price" type="number" min="0.01" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $car->price }}" required>
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
                                        <input id="photo" type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo">
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
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ $car->description }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="notes" class="col-md-4 col-form-label text-md-right">{{ __('Notes') }}</label>

                                <div class="col-md-6">
                                    <textarea id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes">{{ $car->notes }}</textarea>

                                    @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
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

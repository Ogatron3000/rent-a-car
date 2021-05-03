@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Client') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ $client->path() }}">
                            @method("PUT")
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $client->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                                <div class="col-md-6">
                                    <select id="country_id" class="form-control" name="country_id" required>
                                        @foreach($countries as $country)
                                            <option {{ $country->id === $client->country_id ? 'selected' : '' }} value={{ $country->id }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="passport" class="col-md-4 col-form-label text-md-right">{{ __('Passport') }}</label>

                                <div class="col-md-6">
                                    <input id="passport" type="text" class="form-control @error('passport') is-invalid @enderror" name="passport" value="{{ $client->passport }}" required autocomplete="passport" autofocus>

                                    @error('passport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $client->email }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $client->phone }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_reservation" class="col-md-4 col-form-label text-md-right">{{ __('First Reservation') }}</label>

                                <div class="col-md-6">
                                    <input id="first_reservation" type="text" class="form-control @error('first_reservation') is-invalid @enderror" name="first_reservation" value="{{ $client->first_reservation }}" required autocomplete="first_reservation" autofocus>

                                    @error('first_reservation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_reservation" class="col-md-4 col-form-label text-md-right">{{ __('Last Reservation') }}</label>

                                <div class="col-md-6">
                                    <input id="last_reservation" type="text" class="form-control @error('last_reservation') is-invalid @enderror" name="last_reservation" value="{{ $client->last_reservation }}" required autocomplete="last_reservation" autofocus>

                                    @error('last_reservation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="registered" class="col-md-4 col-form-label text-md-right">{{ __('Registered') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="registered" required>
                                        @for($val = 0; $val <= 1; $val++)
                                            <option {{ $val === $client->registered ? 'selected' : '' }} value={{ $val }}>
                                                {{ $val === 0 ? 'No' : 'Yes' }}
                                            </option>
                                        @endfor
                                    </select>

                                    @error('registered')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="notes" class="col-md-4 col-form-label text-md-right">{{ __('Notes') }}</label>

                                <div class="col-md-6">
                                    <textarea id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes">{{ $client->notes }}</textarea>

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
                                        {{ __('Update') }}
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

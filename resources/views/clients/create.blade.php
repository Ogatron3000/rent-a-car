@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Client') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.clients.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <select id="country_id" class="form-control" name="country_id" required>
                                        @foreach($countries as $country)
                                            <option {{ $country->id === old('country') ? 'selected' : '' }} value={{ $country->id }}>{{ $country->name }}</option>
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
                                    <input id="passport" type="text" class="form-control @error('passport') is-invalid @enderror" name="passport" value="{{ old('passport') }}" required autocomplete="passport">

                                    @error('passport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_reservation" class="col-md-4 col-form-label text-md-right">{{ __('First Reservation') }}</label>

                                <div class="col-md-6">
                                    <input id="first_reservation" type="date" class="form-control @error('first_reservation') is-invalid @enderror" name="first_reservation" value="{{ old('first_reservation') }}" required autocomplete="first_reservation">

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
                                    <input id="last_reservation" type="date" class="form-control @error('last_reservation') is-invalid @enderror" name="last_reservation" value="{{ old('last_reservation') }}" required autocomplete="last_reservation">

                                    @error('last_reservation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--<div class="form-group row">--}}
                            {{--    <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>--}}

                            {{--    <div class="col-md-6">--}}
                            {{--        <select id="user_id" class="form-control" name="user_id" required>--}}
                            {{--            @foreach($users as $user)--}}
                            {{--                <option {{ $user->id === old('user_id') ? 'selected' : '' }} value={{ $user->id }}>{{ $user->name }}</option>--}}
                            {{--            @endforeach--}}
                            {{--        </select>--}}

                            {{--        @error('user_id')--}}
                            {{--        <span class="invalid-feedback" role="alert">--}}
                            {{--            <strong>{{ $message }}</strong>--}}
                            {{--        </span>--}}
                            {{--        @enderror--}}
                            {{--    </div>--}}
                            {{--</div>--}}

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

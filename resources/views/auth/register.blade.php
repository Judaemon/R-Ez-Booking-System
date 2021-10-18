@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- First name and Last name --}}
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="firstname" class="col-md-5 col-form-label">{{ __('First Name') }}</label>

                                <div class="col-md-12">
                                    <input id="firstname" type="text"
                                        class="m-0 form-control @error('Firstname') is-invalid @enderror"
                                        name="firstname" value="{{ old('firstname') }}" required
                                        autocomplete="firstname" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="lastname" class="col-md-5 col-form-label">{{ __('Last Name') }}</label>

                                <div class="col-md-12">
                                    <input id="lastname" type="text"
                                        class="m-0 form-control @error('Lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" required autocomplete="lastname">

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Username and Email --}}
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="username" class="col-md-5 col-form-label">{{ __('Username') }}</label>

                                <div class="col-md-12">
                                    <input id="username" type="text"
                                        class="m-0 form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="email" class="col-md-7 col-form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="m-0 form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="contact_number" class="col-md-7 col-form-label">{{ __('Contact Number') }}</label>

                                <div class="col-md-12">
                                    <input id="contact_number" type="number"
                                        class="m-0 form-control @error('contact_number') is-invalid @enderror" name="contact_number"
                                        value="{{ old('contact_number') }}" required autocomplete="contact_number">

                                    @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="form-group col-12 col-md-6">
                                    <label for="address" class="col-md-5 col-form-label">{{ __('Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="address" type="text"
                                            class="m-0 form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required autocomplete="address">

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                        </div>          
                        
                        {{-- Password --}}
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="password"
                                    class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="m-0 form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="password-confirm"
                                    class="col-md-7 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="m-0 form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="mr-3 btn btn-primary">
                                    {{ __('Register') }}
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

@extends("layouts.app")

@section('content')

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('updateProfile',$profile->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" type="hidden" name="id" value="{{$profile['id']}}" hidden>
                        {{-- First name and Last name --}}
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="firstname" class="col-md-5 col-form-label">{{ __('First Name') }}</label>

                                <div class="col-md-12">
                                    <input id="firstname" type="text"
                                        class="m-0 form-control @error('firstname') is-invalid @enderror"
                                        name="firstname" value="{{$profile->firstname}}" autofocus>

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
                                        class="m-0 form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{$profile->lastname}}">

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="email" class="col-md-7 col-form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input readonly id="email" type="email"
                                        class="m-0 form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{$profile->email}}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="contact_number"
                                    class="col-md-7 col-form-label">{{ __('Contact Number') }}</label>

                                <div class="col-md-12">
                                    <input id="contact_number" type="number"
                                        class="m-0 form-control @error('contact_number') is-invalid @enderror"
                                        name="contact_number" value="{{$profile->contact_number}}">

                                    @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="image_path" class="col-md-5 col-form-label">{{ __('Profile Picture') }}</label>

                                <div class="col-md-12">
                                    <input id="image_path" type="file"
                                        class="m-0 form-control @error('image_path') is-invalid @enderror"
                                        name="image_path" value="{{$profile->image_path}}" autofocus>

                                    @error('image_path')
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
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="m-0 form-control @error('password') is-invalid @enderror"
                                        name="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="password_confirmation"
                                    class="col-md-7 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password_confirmation" type="password"
                                        class="m-0 form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation">

                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="mr-3 btn btn-primary">
                                    Update
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

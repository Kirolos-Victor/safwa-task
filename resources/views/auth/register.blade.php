@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name_en" class="col-md-4 col-form-label text-md-right">Name in English</label>

                            <div class="col-md-6">
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ old('name_en') }}"  autocomplete="Name in English" autofocus>

                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Please enter your name in English</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_ar" class="col-md-4 col-form-label text-md-right">Name in Arabic</label>

                            <div class="col-md-6">
                                <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name_ar') }}"  autocomplete="Name in Arabic" autofocus>

                                @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>Please enter your name in Arabic</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Date of birth</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}"  autocomplete="date of birth">

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile No.</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  autocomplete="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
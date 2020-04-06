@extends('layouts.auth')

@section('content')
<div class="m-login__head">
    <h3 class="m-login__title">{{ __('Register') }}</h3>
    <div class="m-login__desc">Enter your details to create your account:</div>
</div>
<form class="m-login__form m-form" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group m-form__group">
        <input id="name" class="form-control m-input @error('name') is-invalid @enderror" type="text" placeholder="Fullname" name="name" required>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group m-form__group">
        <input id="email" class="form-control m-input @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" autocomplete="off" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group m-form__group">
        <input id="password" class="form-control m-input @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group m-form__group">
        <input id="password-confirm" class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="password_confirmation" required>
    </div>
    <div class="m-login__form-action">
        <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">{{ __('Register') }}</button>
    </div>
</form>
@endsection
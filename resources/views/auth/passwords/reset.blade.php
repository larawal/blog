@extends('layouts.auth')

@section('content')
<div class="m-login__head">
    <h3 class="m-login__title">{{ __('Reset Password') }}</h3>
</div>
<form class="m-login__form m-form" method="POST" action="{{ route('password.update') }}">
    @csrf
    <div class="form-group m-form__group">
        <input id="email" class="form-control m-input @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" autocomplete="email" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group m-form__group">
        <input id="password" class="form-control m-input @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group m-form__group">
        <input id="password-confirm" class="form-control m-input m-login__form-input--last" type="password" name="password_confirmation" placeholder="Confirm Password" required>
    </div>
    <div class="m-login__form-action">
        <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">{{ __('Reset Password') }}</button>
    </div>
</form>
@endsection
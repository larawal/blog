@extends('layouts.auth')

@section('content')
<div class="m-login__head">
    <h3 class="m-login__title">{{ __('Reset Password') }}</h3>
    <div class="m-login__desc">Enter your email to reset your password:</div>
</div>
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<form class="m-login__form m-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group m-form__group">
        <input id="email" class="form-control m-input @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" autocomplete="off">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="m-login__form-action">
        <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">{{ __('Send Password Reset Link') }}</button>
    </div>
</form>
@endsection
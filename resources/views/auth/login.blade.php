@extends('layouts.auth')

@section('content')
<div class="m-login__head">
    <h3 class="m-login__title">{{ __('Login') }}</h3>
</div>
<form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group m-form__group">
        <input id="email" class="form-control m-input @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" autocomplete="off">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group m-form__group">
        <input id="password" class="form-control m-input m-login__form-input--last @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row m-login__form-sub">
        <div class="col m--align-left m-login__form-left">
            <label class="m-checkbox  m-checkbox--light">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                <span></span>
            </label>
        </div>
        @if(Route::has('password.request'))
        <div class="col m--align-right m-login__form-right">
            <a href="{{ route('password.request') }}" class="m-link">{{ __('Forgot Your Password?') }}</a>
        </div>
        @endif
    </div>
    <div class="m-login__form-action">
        <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">{{ __('Login') }}</button>
    </div>
</form>
@if(Route::has('register'))
<div class="m-login__account">
    <span class="m-login__account-msg">
        Don't have an account yet ?
    </span>&nbsp;&nbsp;
    <a href="{{route('register')}}" class="m-link m-link--light m-login__account-link">Sign Up</a>
</div>
@endif
@endsection
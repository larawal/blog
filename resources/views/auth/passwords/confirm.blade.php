@extends('layouts.auth')

@section('content')
<div class="m-login__head">
    <h3 class="m-login__title">{{ __('Confirm Password') }}</h3>
    <div class="m-login__desc">{{ __('Please confirm your password before continuing.') }}</div>
</div>
<form class="m-login__form m-form" method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <div class="form-group m-form__group">
        <input id="password" class="form-control m-input @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" autocomplete="current-password" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="m-login__form-action">
        <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">{{ __('Confirm Password') }}</button>
    </div>
    @if (Route::has('password.request'))
    <div class="col m--align-right m-login__form-right">
        <a href="{{ route('password.request') }}" class="m-link">{{ __('Forgot Your Password?') }}</a>
    </div>
    @endif
</form>
@endsection
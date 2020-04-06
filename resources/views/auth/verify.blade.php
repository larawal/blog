@extends('layouts.auth')

@section('content')
<div class="m-login__head">
    <h3 class="m-login__title">{{ __('Verify Your Email Address') }}</h3>
</div>
@if (session('resent'))
<div class="alert alert-success" role="alert">
    {{ __('A fresh verification link has been sent to your email address.') }}
</div>
@endif
{{ __('Before proceeding, please check your email for a verification link.') }}
{{ __('If you did not receive the email') }},
<form class="m-login__form m-form" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <div class="m-login__form-action">
        <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">{{ __('click here to request another') }}</button>
    </div>
</form>
@endsection

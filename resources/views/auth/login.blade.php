@extends('layouts.auth')

@section('content')

<div class="card-header">
    <h3 class="text-center font-weight-light my-4">{{ __('Login') }}</h3>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="small mb-1" for="email">{{ __('E-Mail Address') }}</label>
            <input class="form-control py-4 @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Enter email address" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1" for="password">{{ __('Password') }}</label>
            <input class="form-control py-4 @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Enter password" />
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
            </div>
        </div>
        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
        @if (Route::has('password.request'))
            <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
        @endif
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
        </div>
    </form>
</div>
@endsection

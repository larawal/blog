@extends('layouts.auth')

@section('content')
<div class="card-header">
    <h3 class="text-center font-weight-light my-4">{{ __('Confirm Password') }}</h3>
</div>

<div class="card-body">
    {{ __('Please confirm your password before continuing.') }}

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password" class="small mb-1">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <button type="submit" class="btn btn-primary">
                {{ __('Confirm Password') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection

@extends('layouts.auth')

@section('content')
<div class="card-header">
    <h3 class="text-center font-weight-light my-4">{{ __('Reset Password') }}</h3>
</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <label class="small mb-1" for="email">{{ __('E-Mail Address') }}</label>
            <input class="form-control py-4 @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Enter email address" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
        </div>
    </form>
</div>
@endsection

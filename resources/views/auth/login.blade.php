@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Session Status -->
        @if (session("status"))
            <div {{ $attributes->merge(['class' => 'font-medium text-sm text-success']) }}>
                {{ $status }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
            </div>

            @if (Route::has('password.request'))
                <div class="mt-3">
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-600">{{ __('Forgot your password?') }}</a>
                </div>
            @endif
        </form>
    </div>
@endsection

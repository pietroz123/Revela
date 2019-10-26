@extends('layouts.auth')

@section('title', 'Página de Login')

@section('styles')
    <style>
        body {
            background-image: url(../img/background/mountain.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: auto 100%;
        }
    </style>
@endsection

@section('header-bar')
    <div class="brand-logo">
        <div class="container">
            <img src="{{ asset('img/icons/logo.svg') }}" class="brand-icon" alt="Logo Revela">
            <span class="brand-name">Revela</span>
        </div>
    </div>
@endsection

@section('content')
<div class="container">

    <h3 class="pt-5 pb-4">Bem Vindo de Volta!</h3>

    <div class="row">
        <div class="col-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-main float-right">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

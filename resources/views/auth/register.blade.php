@extends('layouts.auth')

@section('title', 'Página de Cadastro')

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
            <a href="/">
                <img src="{{ asset('img/icons/logo.svg') }}" class="brand-icon" alt="Logo Revela">
                <span class="brand-name">Revela</span>
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="container">

    <h3 class="pt-5 pb-4">Seja Bem Vindo!</h3>

    <div class="row">
        <div class="col-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <div class="form-group">
                    <label for="name">{{ __('form.Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus spellcheck="false">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="email">{{ __('form.E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" spellcheck="false">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="password">{{ __('form.Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="password-confirm">{{ __('form.Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-main">
                        {{ __('form.Register') }}
                    </button>
                </div>
            </form>

            <p class="mt-5">Já possui uma conta? <a href="{{ route('login') }}">Acesse ela aqui.</a></p>
        </div>
    </div>

</div>
@endsection

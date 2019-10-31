@extends('layouts.dashboard')

@section('title', 'Dashboard')


@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')

    <h2>Bem Vindo de Volta, {{ Auth::user()->name }}</h2>

    <p class="mt-5">O seu álbum do mês já está liberado</p>

    <a href="{{ route('dashboard.album-do-mes') }}" class="btn btn-light btn-solicitar">
        Solicitar meu álbum
    </a>
    
@endsection
@extends('layouts.dashboard')

@section('title', 'Dashboard')


@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')

    <h2>Bem vindo(a) de volta, {{ explode(' ', Auth::user()->name)[0] }}</h2>

    <h5 class="mt-5">O seu álbum do mês já está liberado</h5>

    <a href="{{ route('dashboard.album-do-mes') }}" class="btn btn-light btn-request mt-2">
        Solicitar meu álbum
    </a>
    
@endsection
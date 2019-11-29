@extends('layouts.dashboard')

@section('title', 'Dashboard')


@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')

    <h2>Bem vindo(a) de volta, {{ explode(' ', Auth::user()->name)[0] }}</h2>

    <h5 class="mt-5">O seu álbum do mês já está liberado! 😍</h5>

    <a class="cta-home mt-2" href="{{ route('dashboard.album-do-mes') }}">
        <span class="content text-uppercase">Solicitar meu álbum</span>
        <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
    </a>
    
@endsection
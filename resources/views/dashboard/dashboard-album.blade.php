@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard-sidebar')

    {{-- <div class="dashboard-logo">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/icons/logo.svg') }}" class="main-icon" alt="Ícone principal da página">
            <span class="brand">revela</span>
        </a>
    </div> --}}

    {{-- <hr> --}}

    <div class="d-flex flex-column justify-content-center align-items-center px-3 pb-0 pt-3">
        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" class="rounded-circle user-image mb-2" alt="">
        <p>{{ Auth::user()->name }}</p>
    </div>

    <hr>

    <div>

        <span class="dashboard-sidebar-divider">Navegação</span>
        <ul class="dashboard-sidebar-items">
            <li class="dashboard-sidebar-item">
                <a href="#!">
                    <i class="far fa-calendar-alt"></i>
                    Álbum do Mês
                </a>
            </li>
            <li class="dashboard-sidebar-item">
                <a href="#!">
                    <i class="fas fa-camera-retro"></i>
                    Minhas Memórias
                </a>
            </li>
            <li class="dashboard-sidebar-item">
                <a href="#!">
                    <i class="fas fa-history"></i>
                    Meus Pedidos
                </a>
            </li>
            <li class="dashboard-sidebar-item">
                <a href="#!">
                    <i class="fas fa-image"></i>
                    Álbuns Avulsos
                </a>
            </li>
        </ul>

        <span class="dashboard-sidebar-divider">Dados Gerais</span>
        <ul class="dashboard-sidebar-items">
            <li class="dashboard-sidebar-item">
                <a href="#!">
                    <i class="far fa-address-card"></i>
                    Dados Cadastrais
                </a>
            </li>
            <li class="dashboard-sidebar-item">
                <a href="#!">
                    <i class="fas fa-cog"></i>
                    Configurações
                </a>
            </li>
            <li class="dashboard-sidebar-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>

    </div>

@endsection

@section('dashboard-content')

    <h2>Álbum do Mês ({{ \Carbon\Carbon::now()->format('F') }} de {{ \Carbon\Carbon::now()->year }})</h2>   

    <h5 class="mt-5">Selecionar Template</h5>

    <h5 class="mt-5">Configurações do Álbum</h5>

    <div class="form-group row mt-4">
        <div class="col-md-4">
            <label for="album-name">Nome do Álbum</label>
            <input class="form-control" name="album-name" id="album-name" type="text" placeholder="Nome do álbum">
        </div>
    </div>

    <div class="form-group row mt-4">
        <div class="col-md-4">
            <label for="album-description">Descrição Especial (Opcional)</label>
            <textarea class="form-control" id="album-description" rows="3" placeholder="Descrição"></textarea>
        </div>   
    </div>

    <h5 class="mt-5">Importar Fotos</h5>

@endsection
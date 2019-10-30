@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
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
@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard-sidebar')
    @include('dashboard-admin.components.sidebar-admin')    
@endsection

@section('dashboard-content')
    <hr class="w-100 mt-4 mb-0">

    <div class="mt-4 w-100">
        <ul class="nav nav-tabs" id="profile-data-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="meus-dados-tab" data-toggle="tab" href="#meus-dados" role="tab" aria-controls="meus-dados"
                aria-selected="true">Meus Dados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="endereco-tab" data-toggle="tab" href="#endereco" role="tab" aria-controls="endereco"
                aria-selected="false">Endereço</a>
            </li>
        </ul>

        <div class="tab-content card px-4 pb-4" id="profile-data-tab-content">
            <div class="tab-pane fade show active" id="meus-dados" role="tabpanel" aria-labelledby="meus-dados-tab">
                
            </div>

            <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
                
            </div>

        </div>
    </div>

    
@endsection
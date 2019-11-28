@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')

    <h2>Meus Pedidos</h2>   

    <div class="mt-5">
     
        {{-- @if (count($pedidos) > 0) --}}
            <table class="table table-cadastro">
                <thead>
                    <tr class="header">
                        <th>Número do Pedido</th>
                        <th>Número do Álbum</th>
                        <th>Número de Fotos</th>
                        <th>Data de Solicitação</th>
                        <th>Status</th>
                        <th>Comprovante</th>
                    </tr>
                </thead>
                <tbody> 
                    {{-- @foreach ($pedidos as $pedido) --}}
                        <tr>
                            <td>011298082497</td>
                            <td>1201</td>
                            <td>5</td>
                            <td>21/11/2019</td>
                            <td>
                                <span class="order-status">
                                    Finalizado
                                </span>
                            </td>
                            <td class="td-actions">
                                <button class="btn-action"><i class="far fa-file-pdf"></i></button>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        {{-- @else --}}
            {{-- <div class="alert alert-info" role="alert">
                Nenhum pedido foi encontrado.
            </div> --}}
        {{-- @endif --}}
    </div>

@endsection
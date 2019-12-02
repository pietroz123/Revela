@extends('layouts.dashboard')

@section('title', 'Meus Pedidos')

@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')

    <h2>Meus Pedidos</h2>   

    <div class="mt-4">
     
        @if (count($orders) > 0)
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
                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>#{{ $order->album->id }}</td>
                            <td>{{ count($order->album->photos) }}</td>
                            <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                            <td>
                                <span class="order-status {{ $order->status }}">
                                    <span class="text-capitalize">{{ $order->status }}</span>
                                </span>
                            </td>
                            <td class="td-actions">
                                <button class="btn-action"><i class="far fa-file-pdf"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info" role="alert">
                Nenhum pedido foi encontrado.
            </div>
        @endif
    </div>

@endsection
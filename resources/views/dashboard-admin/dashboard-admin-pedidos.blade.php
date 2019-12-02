@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard-sidebar')
    @include('dashboard-admin.components.sidebar-admin')    
@endsection

@section('dashboard-content')
    <hr class="w-100 mt-4 mb-0">

    <h5 id="admin-pedidos">Pedidos</h5>

    <div class="mt-4 w-100">
        <ul class="nav nav-tabs" id="profile-data-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="solicitado-tab" data-toggle="tab" href="#solicitado" role="tab" aria-controls="solicitado"
                aria-selected="true">Solicitado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="aprovado-tab" data-toggle="tab" href="#aprovado" role="tab" aria-controls="aprovado"
                aria-selected="false">Aprovado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="producao-tab" data-toggle="tab" href="#producao" role="tab" aria-controls="producao"
                aria-selected="false">Em produção</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="transito-tab" data-toggle="tab" href="#transito" role="tab" aria-controls="transito"
                aria-selected="false">Em trânsito</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="entregue-tab" data-toggle="tab" href="#entregue" role="tab" aria-controls="entregue"
                aria-selected="false">Entregue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cancelado-tab" data-toggle="tab" href="#cancelado" role="tab" aria-controls="cancelado"
                aria-selected="false">Cancelado</a>
            </li>
        </ul>

        <div class="tab-content card px-4 pb-4" id="profile-data-tab-content">
            <div class="tab-pane fade show active" id="solicitado" role="tabpanel" aria-labelledby="solicitado-tab">
                <div class="mt-4">
                    {{-- @if (count($orders) > 0) --}}
                        <table class="table table-cadastro">
                            <thead>
                                <tr class="header">
                                    <th>Nome do Cliente</th>
                                    <th>Número do Álbum</th>
                                    <th>Data de Solicitação</th>
                                </tr>
                            </thead>
                            <tbody> 
                                {{-- @foreach ($orders as $order) --}}
                                    <tr>
                                        <td>Bianca</td>
                                        <td>#1</td>
                                        <td>01/12/2019</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    {{-- @else
                        <div class="alert alert-info" role="alert">
                            Nenhum pedido foi encontrado.
                        </div>
                    @endif --}}
                </div>
            </div>

            <div class="tab-pane fade" id="aprovado" role="tabpanel" aria-labelledby="aprovado-tab">
                <div class="mt-4">
                    {{-- @if (count($orders) > 0) --}}
                        <table class="table table-cadastro">
                            <thead>
                                <tr class="header">
                                    <th>Nome do Cliente</th>
                                    <th>Número do Álbum</th>
                                    <th>Data de Solicitação</th>
                                </tr>
                            </thead>
                            <tbody> 
                                {{-- @foreach ($orders as $order) --}}
                                    <tr>
                                        <td>Bianca</td>
                                        <td>#1</td>
                                        <td>01/12/2019</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    {{-- @else
                        <div class="alert alert-info" role="alert">
                            Nenhum pedido foi encontrado.
                        </div>
                    @endif --}}
                </div>
            
            </div>

            <div class="tab-pane fade" id="producao" role="tabpanel" aria-labelledby="producao-tab">
                <div class="mt-4">
                    {{-- @if (count($orders) > 0) --}}
                        <table class="table table-cadastro">
                            <thead>
                                <tr class="header">
                                    <th>Nome do Cliente</th>
                                    <th>Número do Álbum</th>
                                    <th>Data de Solicitação</th>
                                </tr>
                            </thead>
                            <tbody> 
                                {{-- @foreach ($orders as $order) --}}
                                    <tr>
                                        <td>Bianca</td>
                                        <td>#1</td>
                                        <td>01/12/2019</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    {{-- @else
                        <div class="alert alert-info" role="alert">
                            Nenhum pedido foi encontrado.
                        </div>
                    @endif --}}
                </div>
                                    
            </div>

            <div class="tab-pane fade" id="transito" role="tabpanel" aria-labelledby="transito-tab">
                <div class="mt-4">
                    {{-- @if (count($orders) > 0) --}}
                        <table class="table table-cadastro">
                            <thead>
                                <tr class="header">
                                    <th>Nome do Cliente</th>
                                    <th>Número do Álbum</th>
                                    <th>Data de Solicitação</th>
                                    <th>Previsão de Entrega</th>
                                </tr>
                            </thead>
                            <tbody> 
                                {{-- @foreach ($orders as $order) --}}
                                    <tr>
                                        <td>Bianca</td>
                                        <td>#1</td>
                                        <td>01/12/2019</td>
                                        <td>05/12/2019</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    {{-- @else
                        <div class="alert alert-info" role="alert">
                            Nenhum pedido foi encontrado.
                        </div>
                    @endif --}}
                </div>              
                
            </div>

            <div class="tab-pane fade" id="entregue" role="tabpanel" aria-labelledby="entregue-tab">
                <div class="mt-4">
                    {{-- @if (count($orders) > 0) --}}
                        <table class="table table-cadastro">
                            <thead>
                                <tr class="header">
                                    <th>Nome do Cliente</th>
                                    <th>Número do Álbum</th>
                                    <th>Data de Solicitação</th>
                                    <th>Data da Entrega</th>
                                </tr>
                            </thead>
                            <tbody> 
                                {{-- @foreach ($orders as $order) --}}
                                    <tr>
                                        <td>Bianca</td>
                                        <td>#1</td>
                                        <td>01/12/2019</td>
                                        <td>05/12/2019</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    {{-- @else
                        <div class="alert alert-info" role="alert">
                            Nenhum pedido foi encontrado.
                        </div>
                    @endif --}}
                </div>
                                    
            </div>

            <div class="tab-pane fade" id="cancelado" role="tabpanel" aria-labelledby="cancelado-tab">
                <div class="mt-4">
                    {{-- @if (count($orders) > 0) --}}
                        <table class="table table-cadastro">
                            <thead>
                                <tr class="header">
                                    <th>Nome do Cliente</th>
                                    <th>Número do Álbum</th>
                                    <th>Data de Solicitação</th>
                                    <th>Data de Cancelamento</th>
                                </tr>
                            </thead>
                            <tbody> 
                                {{-- @foreach ($orders as $order) --}}
                                    <tr>
                                        <td>Bianca</td>
                                        <td>#1</td>
                                        <td>01/12/2019</td>
                                        <td>01/12/2019</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    {{-- @else
                        <div class="alert alert-info" role="alert">
                            Nenhum pedido foi encontrado.
                        </div>
                    @endif --}}
                </div>
                    
            </div>

        </div>
    </div>

    
@endsection
@extends('layouts.dashboard')

@section('title', 'Editar')


@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')

    <h5>Editar</h5>

    <form method="POST" action="{{ route('users.update', Auth::user()->id) }}">
        @method('PUT')
        @csrf

        <div class="row mt-5">
        
            <div class="col">
                <h5>Informações Básicas</h5>
        
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nome" value="{{ Auth::user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="999.999.999-99" value="{{ Auth::user()->cpf }}" readonly>
                        </div>
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="E-mail" value="{{ Auth::user()->email }}" readonly>
                </div>
        
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="cellphone">Tel. Celular</label>
                            <input type="text" id="cellphone" name="cellphone" class="form-control" placeholder="Telefone Celular" value="{{ Auth::user()->cellphone }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="phone">Tel. Residencial</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Telefone Celular" value="{{ Auth::user()->phone }}">
                        </div>
                    </div>
                </div>
        
            </div>
        
            <div class="col">
        
                <h5>Endereço</h5>
        
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="zip_code">CEP</label>
                            <input type="text" id="zip_code" name="zip_code" class="form-control" placeholder="99999-999" value="{{ Auth::user()->zip_code }}">
                        </div>
                    </div>
        
                    <div class="col">
                        <div class="form-group">
                            <label for="city">Cidade</label>
                            <select class="browser-default custom-select" id="city" name="city">
                                <option>Cidade</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ auth()->user()->city ? (auth()->user()->city->name == $city->name ? 'selected' : '') : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="neighborhood">Bairro</label>
                    <input type="text" class="form-control" id="neighborhood" placeholder="Bairro" name="neighborhood" autocomplete="new" value="{{ Auth::user()->neighborhood }}">
                </div>
        
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="street">Rua</label>
                            <input type="text" class="form-control" id="street" placeholder="Rua" name="street" autocomplete="new" value="{{ Auth::user()->street }}">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="street_number">Número</label>
                            <input type="text" class="form-control" id="street_number" placeholder="Nº" name="street_number" autocomplete="new" value="{{ Auth::user()->street_number }}"  >
                        </div>
                    </div>
                </div>
                    
                <div class="form-group">
                    <label for="street_complement">Complemento</label>
                    <input type="text" class="form-control" id="street_complement" placeholder="Complemento" name="street_complement" autocomplete="new" value="{{ Auth::user()->street_complement }}">
                </div>
        
            </div>
        
        </div>
        
        <button type="submit" class="btn btn-info mt-5 btn-editar-dados">Salvar</button>
    </form>

    
@endsection

@section('scripts')
    <script src="{{ asset('js/dashboard/editar-dados-cadastrais.js') }}"></script>
@endsection
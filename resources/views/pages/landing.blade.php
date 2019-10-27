@extends('layouts.app')

@section('title', 'Landing')

@section('content')
    
    <section id="hero-section">

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Tenha todas as suas fotos na palma da sua mão. Literalmente.</h2>
                    <p>Revela é a plataforma que te ajuda a liberar espaço no seu celular, colocando-as em um álbum digital todo mês.</p>
                    <a class="cta-home mt-3" href="#!">
                        <span class="content">Começar agora</span>
                        <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                    {{-- <a href="#!" class="btn btn-primary btn-main landing-cta">
                        Começar agora
                    </a> --}}
                </div>
            </div>
        </div>

    </section>

@endsection

@extends('layouts.landing')

@section('title', 'Landing')
@section('main-class', 'landing-page')

@section('content')

    <article id="main-section">

        @include('includes.navbar')

        <section id="hero-section">
    
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-6">
                        <h2>Tenha todas as suas fotos na palma da sua mão. Literalmente.</h2>
                        <p>Revela é a plataforma que te ajuda a liberar espaço no seu celular, colocando-as em um álbum digital todo mês.</p>
                        <a class="cta-home mt-3" href="#!">
                            <span class="content">Começar agora</span>
                            <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
            </div>
    
        </section>
    
        <section id="albums-section" class="nav-waypoint">
    
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-6">
                        <h2>Receba um álbum personalizado todo mês com seus momentos mais importantes.</h2>
                        <p>Garantimos álbuns personalizados todo mês de acordo com as estações do ano, eventos e festividades.</p>
                    </div>
                </div>
            </div>
    
        </section>

    </article>
    
    <section id="steps-section">

        <div class="container">

            <h2>Veja como é fácil começar</h2>

            <div id="timeline">
                <div class="timeline-item">
                    <div class="timeline-icon">
                        1
                    </div>
                    <div class="timeline-content right">
                        <h2>Crie uma conta gratuíta</h2>
                        <p>
                            Você pode criar uma conta com Facebook e Google caso prefira
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-icon">
                        2
                    </div>
                    <div class="timeline-content left">
                        <h2>Escolha o seu plano</h2>
                        <p>
                            Temos uma variedade de planos para melhor atender suas necessidades
                        </p>
                    </div>
                </div>
            
                <div class="timeline-item">
                    <div class="timeline-icon">
                        3
                    </div>
                    <div class="timeline-content right">
                        <h2>Escolha suas fotos favoritas</h2>
                        <p>
                            Essa é a parte que você seleciona suas melhores fotos do seu celular
                        </p>
                    </div>
                </div>
            
                <div class="timeline-item">
                    <div class="timeline-icon">
                        4
                    </div>
                    <div class="timeline-content left">
                        <h2>Receba seu álbum em casa</h2>
                        <p>
                            Agora é só esperar pelo seu álbum personalizado no conforto da sua casa
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section id="plans-section">

        <div class="container">

            <h2>Nossos pacotes</h2>
            
            <div class="plans">

                <div class="card plan-card">
                    <div class="plan-deal">
                        <span>Para começar</span>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/icons/camera.svg') }}" alt="Câmera fotográfica vermelha">
                        <h4>Iniciante</h4>
                        <h4>1 mês</h4>
                        <h4 class="plan-price">
                            <span>R$</span> 
                            <span>29.90</span>
                            <span>/mês</span>
                        </h4>
                        <a href="#!" class="btn btn-main text-uppercase btn-buy">Comprar</a>
                    </div>
                </div>
    
                <div class="card plan-card">
                    <div class="plan-deal">
                        <span>Mais vendido</span>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/icons/photo-album.svg') }}" alt="Álbum de colecionador">
                        <h4>Colecionador</h4>
                        <h4>3 meses</h4>
                        <h4 class="plan-price">
                                <span>R$</span> 
                                <span>24.90</span>
                                <span>/mês</span>
                            </h4>
                        <a href="#!" class="btn btn-main text-uppercase btn-buy">Comprar</a>
                    </div>
                </div>
    
                <div class="card plan-card">
                    <div class="plan-deal">
                        <span>Melhor preço</span>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/icons/polaroid.svg') }}" alt="Câmera Polaroid">
                        <h4>Nostalgia</h4>
                        <h4>6 meses</h4>
                        <h4 class="plan-price">
                                <span>R$</span> 
                                <span>18.90</span>
                                <span>/mês</span>
                            </h4>
                        <a href="#!" class="btn btn-main text-uppercase btn-buy">Comprar</a>
                    </div>
                </div>

            </div>

        </div>


    </section>

    <section id="start">

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Começe a relembrar seus melhores momentos hoje</h2>
                    <a class="cta-home mt-3" href="#!">
                        <span class="content">Começar agora</span>
                        <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>

    </section>


@endsection

@section('scripts')
    <script src="{{ asset('js/pages/landing.js') }}"></script>
@endsection
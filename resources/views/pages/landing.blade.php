@extends('layouts.landing')

@section('title', 'Landing')

@section('content')

    <article id="main-section">

        @include('includes.navbar')

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
                    </div>
                </div>
            </div>
    
        </section>
    
        <section id="albums-section">
    
            <div class="container">
                <div class="row">
                    <div class="col-6">
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


@endsection

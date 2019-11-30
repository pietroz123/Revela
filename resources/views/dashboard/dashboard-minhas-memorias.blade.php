@extends('layouts.app')

@section('content')
    
    @if (count($albums) == 0)
        <div class="alert alert-info mt-3" role="alert">
            <span>Você ainda não criou nenhum album.</span>
        </div>
    @else
        <section id="my-albums" class="mt-4">
            @foreach ($albums as $month => $photos)
                <h5 class="album-month">{{ $month }}</h3>
                <div class="albums">
                    @foreach ($photo as $photo)
                        <div class="album-card hoverable">
                            <a href="#!">
                                <img src="" alt="Album Photo">
                                <div class="album-name">{{ $photo['name'] }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>
    @endif

@endsection
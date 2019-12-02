@extends('layouts.dashboard')

@section('title', 'Minhas Memórias')

@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')
    
    @if (count($albums) == 0)
        <div class="alert alert-info mt-3" role="alert">
            <span>Você ainda não criou nenhum album.</span>
        </div>
    @else
        <section id="my-albums" class="mt-4">
            @foreach ($albums as $month => $month_albums)
                <h5 class="album-month">{{ App\Traits\DateTrait::getMonthName($month) }}</h3>
                <div class="albums">
                @foreach ($month_albums as $album)
                    <div class="album-card hoverable">
                        <a href="{{ route('albums.show', $album->id) }}">
                            <img src="{{ $album->photos->first()->path }}" alt="Album Photo">
                            <div class="album-name">{{ $album->name }}</div>
                        </a>
                    </div>
                    {{-- @foreach ($album->photos as $photo)
                    @endforeach; --}}
                @endforeach
            @endforeach
        </section>
    @endif

@endsection
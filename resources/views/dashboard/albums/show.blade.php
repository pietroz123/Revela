@extends('layouts.dashboard')

@section('title', 'Álbum ' . $album->name)

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/css/lightgallery.min.css">
@endsection

@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')

    <h2>Álbum {{ $album->name }}</h2>
    <h5>{{ App\Traits\DateTrait::getMonthName($album->month) }} de {{ date('Y', strtotime($album->created_at)) }}</h5>
    <hr>

    <div class="mt-5" id="album-photos">
        @foreach ($album->photos as $photo)
            <div class="view overlay my-zoom album-img-container" data-src="{{ asset($photo->path) }}">
                <img src="{{ asset($photo->path) }}" class="img-fluid album-img" alt="zoom">
                <div class="mask flex-center waves-effect waves-light">
                    <p class="white-text"><i class="fas fa-search-plus"></i></p>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/dashboard/albums/show.js') }}"></script>
@endsection
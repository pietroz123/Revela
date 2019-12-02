@extends('layouts.dashboard')

@section('title', 'Álbum ' . $album->name)

@section('dashboard-sidebar')
    @include('dashboard.components.sidebar')    
@endsection

@section('dashboard-content')

    <h2>Álbum {{ $album->name }}</h2>
    <h5>{{ App\Traits\DateTrait::getMonthName($album->month) }} de {{ date('Y', strtotime($album->created_at)) }}</h5>
    <hr>

    <div class="album-photos mt-5">
        @foreach ($album->photos as $photo)
            <img src="{{ asset($photo->path) }}" class="img-thumbnail zoom album-img">
        @endforeach
    </div>

@endsection
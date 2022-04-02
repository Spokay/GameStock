@extends('layout')

@section('content')
    <div class="container-fluid">

        <div class="container popular-games">
            <h2 class="my-4">Games Catalog</h2>
            <div class="card-group">
                @foreach($games as $game)
                <div class="card col-6">
                    <img src="{{asset($game->gameLogo)}}" class="card-img-top" alt="logo of the game">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->gameName }}</h5>
                        <p class="card-text">{{ $game->gameDescription }}</p>
                        <a href="{{route('games.show', $game->id)}}" class="btn btn-primary">Play</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

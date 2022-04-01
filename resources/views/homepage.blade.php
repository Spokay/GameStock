@extends('layout')


@section('content')
    <div class="container-fluid">

        <div class="container popular-games">
            <h2 class="my-4">Popular games</h2>
            <div>
                @foreach ($popularGames as $popularGame)
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset($popularGame->gameLogo)}}" class="card-img-top" alt="logo of the game">
                        <div class="card-body">
                            <h5 class="card-title">{{ $popularGame->gameName }}</h5>
                            <p class="card-text">{{ $popularGame->gameDescription }}</p>
                            <a href="{{route('games.show', $popularGame->gameId)}}" class="btn btn-primary">Play</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

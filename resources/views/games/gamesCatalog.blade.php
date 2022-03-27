@extends('layout')

@section('content')

    <div class="container-fluid">

        <div class="container popular-games">
            <h2 class="my-4">Games Catalog</h2>
            <div class="card-group">
                <?php
                foreach ($gamesObjs as $game){
                ?>
                <div class="card col-6">
                    <img src="{{asset($game->getLogo())}}" class="card-img-top" alt="logo of the game">
                    <div class="card-body">
                        <h5 class="card-title"><?= $game->getName(); ?></h5>
                        <p class="card-text"><?= $game->getDesc(); ?></p>
                        <a href="{{url('/games/game/'.$game->getId())}}" class="btn btn-primary">Play</a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
@endsection

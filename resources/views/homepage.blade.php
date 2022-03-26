@extends('layout')


@section('content')
    <div class="container-fluid">

        <div class="container popular-games">
            <h2 class="my-4">Popular games</h2>
            <div>
                <?php
                foreach ($gamesObjsPopular as $popularGame){
                ?>
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset($popularGame->getLogo())}}" class="card-img-top" alt="logo of the game">
                        <div class="card-body">
                            <h5 class="card-title"><?= $popularGame->getName(); ?></h5>
                            <p class="card-text"><?= $popularGame->getDesc(); ?></p>
                            <a href="{{url('/games/game/'.$popularGame->getId())}}" class="btn btn-primary">Play</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
@endsection

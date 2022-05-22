<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeRequest;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Http\Requests\Game as GameRequest;

class ControllerGame extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $games = Game::all();
        return view("gamesCatalog", compact('games'));
    }

    public function popular()
    {
        $popularGames = Game::all();
        $games = Game::all();
        return view('homepage', compact('popularGames', 'games'));
    }

   /* public function like(GameRequest $gameRequest){
        //
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Game $game)
    {
        return view('gamePlayer', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateLike(LikeRequest $request,Game $game)
    {
        if ($request->authorize()){
            $game->gamePopularity += 1;
            $game->save();
            echo "ok";
            return back()->with('success', 'Blog Updated');
        }

    }

}

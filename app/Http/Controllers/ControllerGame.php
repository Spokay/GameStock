<?php

namespace App\Http\Controllers;

use App\Models\Dao\GameDao;
use Illuminate\Http\Request;

class ControllerGame extends Controller
{
    public function index()
    {
        $gameDao = new GameDao();
        $gamesObjs = $gameDao->getAll();
        return view('games/gamesCatalog', compact('gamesObjs'));
    }

    public function popular()
    {
        $gameDao = new GameDao();
        $gamesObjsPopular = $gameDao->getPopular();
        $gamesObjs = $gameDao->getAll();
        return view('homepage', compact('gamesObjsPopular', 'gamesObjs'));
    }

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

    public function show($id)
    {
        $gameDao = new GameDao();
        $gameObj = $gameDao->getOne($id);
        return view('games/gamePlayer', compact('gameObj'));
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
}

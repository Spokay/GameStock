<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerGame;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* home page route */
Route::resource('games', ControllerGame::class);
Route::get('/', [ControllerGame::class, 'popular'])->name('homepage');
//Route::put('games/{id}', [ControllerGame::class, 'like'])->name('games.like');
/* game reader route */

//Auth::routes();



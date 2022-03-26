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
Route::get('/', [ControllerGame::class, 'popular']);
/* game reader route */
Route::get('/games/all',[ControllerGame::class, 'index']);
Route::get('/games/game/{id}',[ControllerGame::class, 'show']);
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


<?php

use App\Http\Controllers\LeagueController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Models\Player;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/players', PlayerController::class .'@index')->name('players.index');

Route::get('/players/create', PlayerController::class . '@create')->name('players.create');

Route::delete('/players/{player}', PlayerController::class .'@destroy')->name('players.destroy');


Route::get('/teams', TeamController::class .'@index')->name('teams.index');

Route::get('/teams/create', TeamController::class . '@create')->name('teams.create');

Route::delete('/teams/{player}', TeamController::class .'@destroy')->name('teams.destroy');



Route::get('/leagues', LeagueController::class .'@index')->name('leagues.index');

Route::get('/leagues/create', LeagueController::class . '@create')->name('leagues.create');

Route::delete('/leagues/{player}', LeagueController::class .'@destroy')->name('leagues.destroy');
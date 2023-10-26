<?php

use App\Http\Controllers\GameController;
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

Route::get('/', LeagueController::class .'@index')->name('leagues.index');

Route::get('/players', PlayerController::class .'@index')->name('players.index');
Route::get('/players/create', PlayerController::class . '@create')->name('players.create');
Route::post('/players', PlayerController::class . '@store')->name('players.store');
Route::get('/players/{player}/edit', PlayerController::class .'@edit')->name('players.edit');
Route::put('/players/{player}', PlayerController::class .'@update')->name('players.update');
Route::delete('/players/{player}', PlayerController::class .'@destroy')->name('players.destroy');

Route::get('/teams', TeamController::class .'@index')->name('teams.index');
Route::get('/teams/create', TeamController::class . '@create')->name('teams.create');
Route::post('/teams', TeamController::class . '@store')->name('teams.store');
Route::get('/teams/{team}/edit', TeamController::class .'@edit')->name('teams.edit');
Route::put('/teams/{team}', TeamController::class .'@update')->name('teams.update');
Route::delete('/teams/{player}', TeamController::class .'@destroy')->name('teams.destroy');


Route::get('/leagues', LeagueController::class .'@index')->name('leagues.index');
Route::get('/leagues/create', LeagueController::class . '@create')->name('leagues.create');
Route::post('/leagues', LeagueController::class . '@store')->name('leagues.store');
Route::get('/leagues/{leagues}/edit', LeagueController::class . '@edit')->name('leagues.edit');
Route::get('/leagues/{league}', LeagueController::class .'@show')->name('leagues.show');
Route::put('/leagues/{team}', LeagueController::class .'@update')->name('leagues.update');
Route::delete('/leagues/{league}', LeagueController::class .'@destroy')->name('leagues.destroy');

Route::get('/leagues/games/{game}/edit', GameController::class .'@edit')->name('games.edit');
Route::put('/leagues/games/{games}', GameController::class .'@update')->name('games.update');
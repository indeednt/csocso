<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Models\League;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function edit($id)
    {        
        return view('pages.games_edit', ['game' => Game::find($id)]);
    }

    public function update(UpdateGameRequest $request, $id){
        $data = $request->validated();
        $game = Game::find($id);
        if(!($data['team_1_score'] == 10 && $data['team_2_score'] == 10)){
            $game->update($data);
        }
        return view('pages.leagues_show', ['league' => League::find($game->league_id)]);
    }
}

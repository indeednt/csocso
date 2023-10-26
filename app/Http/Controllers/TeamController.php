<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {        
        $teams = Team::all();
        return view('pages.teams', ['teams' => $teams]);
    }

    public function create()
    {
        $players = [];

        foreach (Player::all() as $player) {
            $players[$player->id] = $player->name;
        }

        return view('pages.teams_create', ['players' => $players]);
    }

    public function store(StoreTeamRequest $request)
    {
        $data = $request->validated();
        $team = Team::create($data);
        return redirect('/teams');
    }

    public function edit($id)
    {
        $players = [];
        foreach (Player::all() as $player) {
            $players[$player->id] = $player->name;
        }
        return view('pages.teams_edit', ['team' => Team::find($id), 'players' => $players]);
    }

    public function update(UpdateTeamRequest $request, $id)
    {
        $data = $request->validated();
        $team = Team::find($id);
        $team->update($data);
        return redirect()->route('teams.index');
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('teams.index');
    }
}

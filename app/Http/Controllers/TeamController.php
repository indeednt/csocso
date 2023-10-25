<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $team = Team::create([
            'name'=> $request->name,
            'kapus_id' => $request->kapus_id,
            'csatar_id' => $request->csatar_id
        ]);

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

    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        $team->update($request->all());
        return redirect()->route('teams.index')
        ->with('success', 'Team updated successfully.');
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('teams.index')
        ->with('success', 'Team deleted successfully');
    }
}

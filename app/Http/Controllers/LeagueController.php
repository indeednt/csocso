<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function index()
    {        
        $leagues = League::all();
        return view('pages.leagues', ['leagues' => $leagues]);
    }

    public function show($leagueId)
    {        
        return view('pages.leagues_show', ['league' => League::find($leagueId)]);
    }

    public function create()
    {
        $teams = [];

        foreach (Team::all() as $team) {
            $teams[$team->id] = $team->name;
        }


        return view('pages.leagues_create', ['teams' => $teams]);
    }

    public function store(Request $request)
    {
        $league = League::create([
            'name'=> $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $league->sorsol();

        return redirect('/leagues');
    }


    public function edit($id)
    {
        return view('pages.leagues_edit', ['league' => League::find($id)]);
    }

    public function update(Request $request, $id){
        $league = League::find($id);
        $league->update($request->all());
        return redirect()->route('leagues.index')
        ->with('success', 'League updated successfully.');
    }


    public function destroy($id)
    {
        $league = League::find($id);
        $league->delete();
        return redirect()->route('leagues.index')
        ->with('success', 'League deleted successfully');
    }
}

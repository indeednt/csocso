<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeagueRequest;
use App\Http\Requests\UpdateLeagueRequest;
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

    public function show($id)
    {        
        return view('pages.leagues_show', ['league' => League::find($id)]);
    }

    public function create()
    {
        $teams = [];
        foreach (Team::all() as $team) {
            $teams[$team->id] = $team->name;
        }

        return view('pages.leagues_create', ['teams' => $teams]);
    }

    public function store(StoreLeagueRequest $request)
    {
        $data = $request->validated();
        $league = League::create($data);
        $league->generateGames();
        return redirect('/leagues');
    }


    public function edit($id)
    {
        return view('pages.leagues_edit', ['league' => League::find($id)]);
    }

    public function update(UpdateLeagueRequest $request, $id){
        $data = $request->validated();
        $league = League::find($id);
        $league->update($data);
        return redirect()->route('leagues.index');
    }

    public function destroy($id)
    {
        $league = League::find($id);
        $league->delete();
        return redirect()->route('leagues.index');
    }
}

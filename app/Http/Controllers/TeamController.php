<?php

namespace App\Http\Controllers;

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
        return view('pages.teams_add', []);
    }


    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('teams.index')
        ->with('success', 'Team deleted successfully');
    }
}

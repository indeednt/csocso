<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function index()
    {        
        $leagues = League::all();
        return view('pages.leagues', ['leagues' => $leagues]);
    }

    public function create()
    {
        return view('pages.leagues_add', []);
    }


    public function destroy($id)
    {
        $league = League::find($id);
        $league->delete();
        return redirect()->route('leagues.index')
        ->with('success', 'League deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function index()
    {        
        $players = Player::all();
        return view('pages.players', ['players' => $players]);
    }

    public function create()
    {
        return view('pages.players_add', []);
    }


    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return redirect()->route('players.index')
        ->with('success', 'Player deleted successfully');
    }
}

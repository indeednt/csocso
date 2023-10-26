<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
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
        return view('pages.players_create', []);
    }

    public function store(StorePlayerRequest $request)
    {
        $data = $request->validated();
        $player = Player::create($data);
        return redirect('/players');
    }

    public function edit($id)
    {
        return view('pages.players_edit', ['player' => Player::find($id)]);
    }

    public function update(UpdatePlayerRequest $request, $id){
        $data = $request->validated();
        $player = Player::find($id);
        $player->update($request->all());
        return redirect()->route('players.index');
    }
    
    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return redirect()->route('players.index');
    }
}

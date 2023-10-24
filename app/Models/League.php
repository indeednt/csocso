<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    protected $table = 'leagues';

    public function games(){
        return $this->hasMany(Game::class);
    }

    // TODO translate
    public function sorsol(){
        $teams = Team::all();

        $games = [];

        for($i = 0; $i<$teams->count(); $i++){
            for($k = $i+1; $k<$teams->count(); $k++){
                array_push($games, Game::create([
                    'league_id' => $this->id,
                    'date' => now(),
                    'team_1_id' => $teams[$i]->id,
                    'team_2_id' => $teams[$k]->id]));
            }
        }
    }


    public function sorsolFactory(){
        $teams = Team::all();

        $games = [];

        for($i = 0; $i<$teams->count(); $i++){
            for($k = $i+1; $k<$teams->count(); $k++){
                array_push($games, Game::create([
                    'league_id' => $this->id,
                    'date' => now(),
                    'team_1_id' => $teams[$i]->id,
                    'team_2_id' => $teams[$k]->id,
                    'team_1_score' => mt_rand(0, 10),
                    'team_2_score' => mt_rand(0, 10)]));
            }
        }
    }

    public function winnerOfLeague(){
       // return $this->games()->get()->;
       // sortByDesc('Winner')->first();
    }
    
    public function listAllGames(){

    }

    public function topList(){
        
    }

    public function crawlingList(){

    }
}

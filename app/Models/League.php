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
                    'team_1_score' => 10,
                    'team_2_score' => mt_rand(0, 9)]));
            }
        }
    }

    public function winnerOfLeague(){
        $winnerList = [];
        foreach ($this->games as $game) {
            
            if(!isset($winnerList[$game->winnerId()])){
                $winnerList[$game->winnerId()] = 1;
            }

            $winnerList[$game->winnerId()]++;
        }

        $max = max($winnerList);

        $winner = array_search($max, $winnerList);

        return $winner;

       // return $this->games()->get()->;
       // sortByDesc('Winner')->first();
    }
    
    public function listAllGames(){

    }

    public function topList(){
        
    }

    public function crawlingList(){
        $crawlingList = [];
        foreach ($this->games as $game) {
            if($game->crawlingTeam() != null){
                if( !isset($crawlingList[$game->crawlingTeam->id]) ){
                    $crawlingList[$game->crawlingTeam->id] = 1;
                }else{
                    $crawlingList[$game->crawlingTeam->id]++;
                }
            }
        }

        ksort($crawlingList, SORT_NUMERIC);

        $arr = [];
        foreach ($crawlingList as $key => $value) {
            array_push($arr, $key);
        }

        return $arr;

    }

    public function status(){
        for($i = 0; $i < $this->games()->count(); $i++){
            if($this->games()->get()[$i]->status() != 'played'){
                return 'unfinished';
            }
        }
        return 'finished';
    }

    public function startDate(){
        return $this->games()->orderBy('created_at')->first()->updated_at;
    }

    public function finishDate(){
        return $this->games()->orderByDesc('updated_at')->first()->updated_at;
    }
}

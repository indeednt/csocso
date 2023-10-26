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

    public function generateGames(){
        $teams = Team::all();

        $games = [];

        for($i = 0; $i<$teams->count(); $i++){
            for($k = $i+1; $k<$teams->count(); $k++){
                array_push($games, Game::create([
                    'league_id' => $this->id,
                    'team_1_id' => $teams[$i]->id,
                    'team_2_id' => $teams[$k]->id]));
            }
        }
    }

    public function topList(){
        $teams = $this->teams();
        usort($teams, function($a, $b)
        {
            return $a->gamesWon($this->id) < $b->gamesWon($this->id);
        });
        return $teams;
    }

    public function crawlingList(){
        $teams = [];
        foreach($this->teams() as $team){
            if($team->countCrawls($this->id) > 0){
                array_push($teams, $team);
            }
        }
        usort($teams, function($a, $b)
        {
            return $a->countCrawls($this->id) < $b->countCrawls($this->id);
        });
        return $teams;
    }

    public function winner(){
        return $this->topList()[0];
    }

    public function teams(){
        $teams = [];

        foreach ($this->games as $game) {
            if(!in_array($game->team_1, $teams)){
                array_push($teams, $game->team_1);
            }
            if(!in_array($game->team_2, $teams)){
                array_push($teams, $game->team_2);
            }
        }
        return $teams;
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
        return $this->games()->orderBy('created_at')->first()->updated_at->format('Y.m.d H:i');
    }

    public function finishDate(){
        return $this->games()->orderByDesc('updated_at')->first()->updated_at->format('Y.m.d H:i');
    }
}

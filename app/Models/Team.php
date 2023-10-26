<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'kapus_id',
        'csatar_id'
    ];

    protected $table = 'teams';

    public function kapus(){
        return $this->hasOne(Player::class, 'id', 'kapus_id');
    }

    public function csatar(){
        return $this->hasOne(Player::class, 'id', 'csatar_id');
    }

    public function leagues(){
        return $this->belongsToMany(League::class);
    }

    public function gamesWhereTeam1(){
        return $this->hasMany(Game::class, 'team_1_id', 'id');
    }

    public function gamesWhereTeam2(){
        return $this->hasMany(Game::class, 'team_2_id', 'id');
    }

    public function gamesWon($leagueId){
        return $this->gamesWhereTeam1()->where('league_id', $leagueId)->where('team_1_score', 10)->count()
            + $this->gamesWhereTeam2()->where('league_id', $leagueId)->where('team_2_score', 10)->count();
    }

    public function countCrawls($leagueId){
        return $this->gamesWhereTeam1()
            ->where('league_id', $leagueId)
            // where the other team won
            ->where('team_2_score', 10)
            ->where('team_1_score', 0)->count()
        + $this->gamesWhereTeam2()
            ->where('league_id', $leagueId)
            // where the other team won
            ->where('team_1_score', 10)
            ->where('team_2_score', 0)->count();
    }

    public function countWins($leagueId){
        return $this->gamesWhereTeam1()->where('league_id', $leagueId)->where('team_1_score', 0)->count()
            + $this->gamesWhereTeam2()->where('league_id', $leagueId)->where('team_2_score', 0)->count();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'league_id',
        'date',
        'team_1_id',
        'team_2_id',
        'team_1_score',
        'team_2_score'
    ];

    protected $table = 'games';


    public function league(){
        return $this->belongsTo(League::class);
    }

    public function team_1(){
        return $this->hasOne(Team::class, 'id', 'team_1_id');
    }

    public function team_2(){
        return $this->hasOne(Team::class, 'id', 'team_2_id');
    }

    public function winner(){
        return $this->team_1_score > $this->team_2_score
        ? $this->team_1()
        : $this->team_2();
    }

    public function winnerId(){
        return $this->team_1_score > $this->team_2_score
        ? $this->team_1_id
        : $this->team_2_id;
    }

    public function crawlingTeam(){
        if($this->team_1_score == 0){
            return $this->team_1();
        }
        if($this->team_2_score == 0){
            return $this->team_2();
        }
        return null;
    }


    public function getWinnerAttribute()
    {
        return $this->winner();
    }

    public function status(){
        if($this->team_1_score == 0 && $this->team_2_score == 0){
            return 'not_played';
        }
        if($this->team_1_score == 10 || $this->team_2_score == 10){
            return 'played';
        }
        return 'being_played';
    }

}

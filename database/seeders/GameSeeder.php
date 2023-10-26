<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\League;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leagues = League::all();


        $teams = Team::all();

        $games = [];

        for($i = 0; $i<$teams->count(); $i++){
            for($k = $i+1; $k<$teams->count(); $k++){
                array_push($games, Game::create([
                    'league_id' => $leagues[0]->id,
                    'team_1_id' => $teams[$i]->id,
                    'team_2_id' => $teams[$k]->id,
                    'team_1_score' => mt_rand(0, 9),
                    'team_2_score' => 10]));
            }
        }
        

        for($l = 1; $l < count($leagues); $l++){
            $teams = Team::all();

            $games = [];

            for($i = 0; $i<$teams->count(); $i++){
                for($k = $i+1; $k<$teams->count(); $k++){
                    array_push($games, Game::create([
                        'league_id' => $leagues[$l]->id,
                        'team_1_id' => $teams[$i]->id,
                        'team_2_id' => $teams[$k]->id,
                        'team_1_score' => mt_rand(0, 10),
                        'team_2_score' => mt_rand(0, 9)]));
                }
            }
        }
    }
}

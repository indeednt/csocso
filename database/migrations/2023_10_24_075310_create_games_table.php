<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_id')->references('id')->on('leagues')->cascadeOnDelete();
            $table->foreignId('team_1_id')->references('id')->on('teams')->cascadeOnDelete();
            $table->foreignId('team_2_id')->references('id')->on('teams')->cascadeOnDelete();
            $table->integer('team_1_score')->default(0);
            $table->integer('team_2_score')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};

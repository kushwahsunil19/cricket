<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('ranking');
            $table->string('player_id');
            $table->string('player_image_link');
            $table->string('player');
            $table->string('team_flag_link');
            $table->string('team');
            $table->unsignedBigInteger('player_type_id');
            $table->foreign('player_type_id')->references('id')->on('player_types');
            $table->unsignedBigInteger('team_type_id');
            $table->foreign('team_type_id')->references('id')->on('team_types');
            $table->string('points');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};

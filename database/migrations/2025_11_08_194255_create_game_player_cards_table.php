<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_player_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('games', 'id', 'game_player_cards_game_id');
            $table->foreignId('player_id')->constrained('users', 'id', 'game_player_cards_player_id');
            $table->foreignId('card_id')->constrained('cards', 'id', 'game_player_cards_card_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_player_cards');
    }
};

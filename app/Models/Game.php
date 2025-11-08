<?php

namespace App\Models;

use App\Enums\GameStatus;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'status',
        'turn_player_id',
        'code',
    ];

    protected $casts = [
        'status' => GameStatus::class,
    ];

    public function players()
    {
        return $this->belongsToMany(
            User::class,
            'game_players',
            'game_id',
            'player_id'
        );
    }
}

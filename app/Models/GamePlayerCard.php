<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GamePlayerCard extends Model
{
    protected $fillable = [
        'game_id',
        'player_id',
        'card_id',
    ];
}

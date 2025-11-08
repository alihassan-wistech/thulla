<?php

namespace App\Enums;

enum GameStatus: string
{
    case OPEN = 'open';
    case COMPLETED = 'completed';
    case STARTED = 'started';
}

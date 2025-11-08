<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Game;
use App\Models\GameMove;
use App\Models\GamePlayer;
use App\Models\GamePlayerCard;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users and cards
        $users = User::all();
        $cards = Card::all()->shuffle();

        // Create 2 games
        for ($g = 1; $g <= 1; ++$g) {
            $game = Game::create([
                'code' => strtoupper(Str::random(6)),
                'status' => 'started',
            ]);

            // Assign first 4 users as players
            $gamePlayers = [];
            for ($i = 0; $i < 4; ++$i) {
                $gamePlayer = GamePlayer::create([
                    'game_id' => $game->id,
                    'player_id' => $users[$i]->id,
                ]);
                $gamePlayers[] = $gamePlayer;
            }

            // Deal 13 cards to each player
            $cardIndex = 0;
            foreach ($gamePlayers as $gp) {
                for ($c = 0; $c < 13; ++$c) {
                    GamePlayerCard::create([
                        'game_id' => $game->id,
                        'player_id' => $gp->player_id,
                        'card_id' => $cards[$cardIndex++]->id,
                    ]);
                }
            }

            // Simulate first trick (4 moves)
            $firstTrickCards = Card::whereIn('id', [
                $cards[0]->id, $cards[13]->id, $cards[26]->id, $cards[39]->id,
            ])->get();

            foreach ($gamePlayers as $index => $gp) {
                if (isset($firstTrickCards[$index])) {
                    GameMove::create([
                        'game_id' => $game->id,
                        'player_id' => $gp->player_id,
                        'card_id' => $firstTrickCards[$index]->id,
                    ]);
                }
            }
        }
    }
}

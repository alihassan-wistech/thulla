<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = File::json(resource_path('data/cards.json'));
        foreach ($cards as $card) {
            Card::create([
                'name' => $card['name'],
                'image' => $card['image'],
                'suit' => $card['suit'],
                'rank' => $card['rank'],
                'color' => $card['color'],
            ]);
        }
    }
}

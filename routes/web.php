<?php

use App\Http\Controllers\ProfileController;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::get('/users', function () {
    $users = User::all();
    dd($users->toArray());
});

Route::get('/games', function () {
    $games = Game::with(['players' => function ($query) {
        $query->with('cardsInHand');
    }])->get();
    dd($games->toArray());
});

Route::get('/cards', function () {
    $cards = File::json(resource_path('data/cards.json'));

    return view('cards', compact('cards'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

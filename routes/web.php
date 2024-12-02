<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;

Route::get('/', [PublicController::class, 'welcome'])->name('homepage');

//rotta profilo
Route::get('/profilo', [ProfileController::class, 'page'])->name('profile.page');
Route::put('/profilo/{user}/aggiorna-avatar', [ProfileController::class, 'setAvatar'])->name('profile.setAvatar');
Route::get('/profilo/{user}/aggiorna-dati', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profilo/{user}/aggiorna-dati', [ProfileController::class, 'update'])->name('profile.update');

//rotta track
Route::get('/musica/crea', [TrackController::class, 'create'])->name('track.create');
Route::post('/musica/crea', [TrackController::class, 'store'])->name('track.store');
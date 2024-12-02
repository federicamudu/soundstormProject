<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;

Route::get('/', [PublicController::class, 'welcome'])->name('homepage');

//rotta profilo
Route::get('/profilo', [ProfileController::class, 'page'])->name('profile.page');
Route::put('/profilo/{user}/aggiorna-avatar', [ProfileController::class, 'setAvatar'])->name('profile.setAvatar');
Route::get('/profilo/{user}/aggiorna-dati', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profilo/{user}/aggiorna-dati', [ProfileController::class, 'update'])->name('profile.update');

//rotta track
Route::get('/musica/crea', [TrackController::class, 'create'])->name('track.create');
Route::post('/musica/crea', [TrackController::class, 'store'])->name('track.store');

Route::get('/musica/tutti-i-brani', [TrackController::class, 'index'])->name('track.index');
Route::get('/musica/tutti-i-brani/{user}/autore', [TrackController::class, 'filterByUser'])->name('track.filterByUser');


//rotte admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/dashboard/users', [AdminController::class, 'users'])->name('admin.dashboard.users');
Route::get('/admin/dashboard/tracks', [AdminController::class, 'tracks'])->name('admin.dashboard.tracks');
Route::get('/admin/dashboard/genres', [AdminController::class, 'genres'])->name('admin.dashboard.genres');
Route::post('/admin/dashboard/genres/store', [AdminController::class, 'store'])->name('admin.dashboard.genres.store');
Route::put('/admin/dashboard/genres/{genre}/update', [AdminController::class, 'update'])->name('admin.dashboard.genres.update');
Route::delete('/admin/dashboard/genres/{genre}/delete', [AdminController::class, 'delete'])->name('admin.dashboard.genres.delete');
Route::get('/musica/tutti-i-brani/{genre}/genere', [TrackController::class, 'filterByGenre'])->name('track.filterByGenre');